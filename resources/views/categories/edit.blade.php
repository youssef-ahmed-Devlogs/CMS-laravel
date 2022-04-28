@extends('layouts.app')


@section('content')
    <div class="card card-default">
        <div class="card-header h3">
            Edit category
        </div>
        <div class="card-body">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group mb-2">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Category name" value="{{ old('name') ? old('name') : $category->name }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button class="btn btn-success btn-sm">
                    Edit Category
                </button>
            </form>
        </div>
    </div>
@endsection
