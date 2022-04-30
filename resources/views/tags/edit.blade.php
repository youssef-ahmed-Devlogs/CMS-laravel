@extends('layouts.app')


@section('content')
    <div class="card card-default">
        <div class="card-header h3">
            Edit tag
        </div>
        <div class="card-body">
            <form action="{{ route('tags.update', $tag->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group mb-2">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="tag name" value="{{ old('name') ? old('name') : $tag->name }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button class="btn btn-success btn-sm">
                    Edit Tag
                </button>
            </form>
        </div>
    </div>
@endsection
