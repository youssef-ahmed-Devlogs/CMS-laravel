@extends('layouts.app')


@section('stylesheets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css" />
@endsection

@section('content')
    <div class="card card-default">
        <div class="card-header h3">
            Add a new user
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-2">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="name" value="{{ old('name') }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <textarea name="about" class="form-control @error('about') is-invalid @enderror"
                        placeholder="about">{{ old('about') }}</textarea>
                    @error('about')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="email" value="{{ old('email') }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <select name="role" class="custom-select @error('role') is-invalid @enderror">
                        <option value="">--select role--</option>

                        @foreach ($roles as $role)
                            <option value="{{ $role }}" {{ old('role') == $role ? 'selected' : '' }}>
                                {{ $role }}
                            </option>
                        @endforeach

                    </select>
                    @error('role')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button class="btn btn-success btn-sm">Add User</button>
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
