@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4 bg-primary text-light">
                <div class="card-body">
                    <h4 class="card-title">
                        <span class="badge bg-light text-primary">Users</span>
                    </h4>
                    <p class="text-center display-4">
                        {{ $users_count }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4 bg-success text-light">
                <div class="card-body">
                    <h4 class="card-title">
                        <span class="badge bg-light text-success">Posts</span>
                    </h4>
                    <p class="text-center display-4">
                        {{ $posts_count }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4 bg-info text-light">
                <div class="card-body">
                    <h4 class="card-title">
                        <span class="badge bg-light text-info">Categories</span>
                    </h4>
                    <p class="text-center display-4">
                        {{ $categories_count }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4 bg-danger text-light">
                <div class="card-body">
                    <h4 class="card-title">
                        <span class="badge bg-light text-danger">Admins</span>
                    </h4>
                    <p class="text-center display-4">
                        {{ $admins_count }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
