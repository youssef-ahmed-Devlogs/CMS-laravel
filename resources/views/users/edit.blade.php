@extends('layouts.app')

@section('stylesheets')
@endsection

@section('content')
    <div class="card card-default">
        <div class="card-header h3">
            Profile
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-2 text-center">
                    <label for="picture">
                        <img src="{{ $user->getPic() }}"
                            style="border-radius:50%;height:200px;width:200px;object-fit:cover">
                        <span class="btn btn-primary btn-sm">Change</span>
                    </label>
                    <input type="file" name="picture" class="d-none" id="picture">
                    @error('picture')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="name" value="{{ old('name') ? old('name') : $user->name }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <textarea name="about" class="form-control @error('about') is-invalid @enderror"
                        placeholder="about">{{ old('about') ? old('about') : $user->profile->about }}</textarea>
                    @error('about')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="email" value="{{ old('email') ? old('email') : $user->email }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <input type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror"
                        placeholder="facebook url"
                        value="{{ old('facebook') ? old('facebook') : $user->profile->facebook }}">
                    @error('facebook')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <input type="text" name="twitter" class="form-control @error('twitter') is-invalid @enderror"
                        placeholder="twitter url"
                        value="{{ old('twitter') ? old('twitter') : $user->profile->twitter }}">
                    @error('twitter')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- <div class="form-group mb-2">
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
                </div> --}}

                <button class="btn btn-success btn-sm">Update</button>
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
