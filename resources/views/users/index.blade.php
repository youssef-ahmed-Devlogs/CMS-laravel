@extends('layouts.app')


@section('content')
    <div class="mb-2 d-flex justify-content-end align-items-center">
        <a href="{{ route('users.create') }}" class="btn btn-primary">+Add User</a>
    </div>
    <div class="card card-default">
        <div class="card-header h3">
            All Users
        </div>
        <div class="card-body p-0">

            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <img src="{{ $user->getPic() }}"
                                    style="width: 100px;height:100px;border-radius:50%;object-fit:cover">
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>

                            <td class="d-flex align-items-center" style="gap: 10px">

                                @if ($user->isAdmin())
                                    <form action="{{ route('users.remove-admin', $user->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger">
                                            Remove Admin
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-success">
                                            Make Admin
                                        </button>
                                    </form>
                                @endif

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if (count($users) <= 0)
                <span class="text-center d-block mb-2">No users yet</span>
            @endif

        </div>
    </div>
@endsection
