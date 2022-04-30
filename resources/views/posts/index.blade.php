@extends('layouts.app')


@section('content')
    <div class="mb-2 d-flex justify-content-end align-items-center">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">+Add Post</a>
    </div>
    <div class="card card-default">
        <div class="card-header h3">
            All Posts
            {{-- {{ !$post->trashed() ? 'All Posts' : 'Trashed Posts' }} --}}
        </div>
        <div class="card-body p-0">

            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $post->image) }}" alt="" style="width: 100px">
                            </td>
                            <td>{{ $post->title }}</td>
                            <td class="d-flex align-items-center" style="gap: 10px">

                                @if (!$post->trashed())
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-success">Edit</a>
                                @else
                                    <form action="{{ route('posts.restore', $post->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <button class="btn btn-sm btn-success">
                                            Restore
                                        </button>
                                    </form>
                                @endif

                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger">
                                        {{ !$post->trashed() ? 'Trash' : 'Delete' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if (count($posts) <= 0)
                <span class="text-center d-block mb-2">No posts yet</span>
            @endif

        </div>
    </div>
@endsection
