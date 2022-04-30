@extends('layouts.app')


@section('stylesheets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css" />
@endsection

@section('content')
    <div class="card card-default">
        <div class="card-header h3">
            Add a new post
        </div>
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-2">
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        placeholder="title" value="{{ old('title') }}">
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                        placeholder="description">{{ old('description') }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <input id="x" type="hidden" name="content" value="{{ old('content') }}">

                    <trix-editor input="x"></trix-editor>

                    @error('content')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <div class="form-group mb-2">
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <select name="category_id" class="custom-select @error('category_id') is-invalid @enderror">
                        <option value="">--select category--</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach

                    </select>
                    @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                @if ($tags->count() > 0)
                    <div class="form-group mb-2">
                        <select id="tags" name="tags[]" class="custom-select @error('tag') is-invalid @enderror" multiple>
                            <option value="">--select tags--</option>

                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" {{ old('tags') == $tag->id ? 'selected' : '' }}>
                                    {{ $tag->name }}
                                </option>
                            @endforeach

                        </select>
                        @error('tags')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                @endif
                <button class="btn btn-success btn-sm">Add Post</button>
            </form>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>

    <script>
        $(document).ready(function() {
            $('#tags').select2();
        });
    </script>
@endsection
