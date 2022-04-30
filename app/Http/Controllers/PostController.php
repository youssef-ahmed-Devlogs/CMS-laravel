<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('checkCategory')->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create', [
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $image = $request->image->store('images', 'public');

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $image,
            'category_id' => $request->category_id
        ]);

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('posts.index')->with('success', "[ $request->title ] post has been added.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $user = $post->user;
        return view('posts.show', compact('post', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title', 'description', 'content', 'category_id']);

        if ($request->hasFile('image')) {
            $image = $request->image->store('images', 'public');
            Storage::disk('public')->delete($post->image);
            $data['image'] = $image;
        }

        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }

        $post->update($data);
        return redirect()->route('posts.edit', $post->id)->with('success', "[ $post->title ] post has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        if ($post->trashed()) {
            $post->forceDelete();
            Storage::disk('public')->delete($post->image);

            return redirect()->route('posts.trashed')->with('success', "[ $post->title ] post has been deleted.");
        }

        $post->delete();
        return redirect()->route('posts.index')->with('success', "[ $post->title ] post has been trashed.");
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->where('id', $id)->first();
        $post->restore();

        return redirect()->route('posts.trashed')->with('success', "[ $post->title ] post has been restored.");
    }

    public function trashed()
    {
        return view('posts.index')->with('posts', Post::onlyTrashed()->get());
    }
}
