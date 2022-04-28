@extends('layouts.app')


@section('content')
    <div class="card card-default">
        <div class="card-header h3">
            Add a new category
        </div>
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Category name" value="{{ old('name') }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button class="
                        btn btn-success btn-sm">Add Category</button>
            </form>
        </div>
    </div>
@endsection
