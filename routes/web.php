<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();



Route::get('/', 'WelcomeController@index');


Route::group(['middleware' => 'auth'], function () {

    // Dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    // Home
    Route::get('/home', 'HomeController@index')->name('home');

    // Users
    Route::group(['prefix' => 'users'], function () {

        Route::get('/', 'UserController@index')->name('users.index');

        // Create
        Route::get('create', 'UserController@create')->name('users.create');
        Route::post('store', 'UserController@store')->name('users.store');

        // Profile | Edit
        Route::get('{user}/profile', 'UserController@edit')->name('users.edit');
        Route::post('{user}/update', 'UserController@update')->name('users.update');

        // Make & Remove Admin
        Route::post('{user}/make-admin', 'UserController@makeAdmin')->name('users.make-admin');
        Route::post('{user}/remove-admin', 'UserController@removeAdmin')->name('users.remove-admin');
    });

    // Categories Routes
    Route::resource('categories', 'CategoryController');

    // Tags Routes
    Route::resource('tags', 'TagController');

    // Posts Routes
    Route::get('posts/trashed', 'PostController@trashed')->name('posts.trashed');
    Route::put('posts/{id}/restore', 'PostController@restore')->name('posts.restore');
    Route::resource('posts', 'PostController');
});
