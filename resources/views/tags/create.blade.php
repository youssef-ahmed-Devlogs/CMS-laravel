@extends('layouts.app')


@section('content')
    <div class="card card-default">
        <div class="card-header h3">
            Add a new tag
        </div>
        <div class="card-body">
            <form action="{{ route('tags.store') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Tag name" value="{{ old('name') }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button class="
                        btn btn-success btn-sm">Add Tag</button>
            </form>
        </div>
    </div>
@endsection
