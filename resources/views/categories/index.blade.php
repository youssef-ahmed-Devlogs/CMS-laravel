@extends('layouts.app')


@section('content')
    <div class="mb-2 d-flex justify-content-end align-items-center">
        <a href="{{ route('categories.create') }}" class="btn btn-primary">+Add Category</a>
    </div>
    <div class="card card-default">
        <div class="card-header h3">
            All categories
        </div>
        <div class="card-body p-0">

            <table class="table">
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td class="d-flex justify-content-end align-items-center" style="gap: 10px">
                                <a href="{{ route('categories.edit', $category->id) }}"
                                    class="btn btn-sm btn-success">Edit</a>

                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if (count($categories) <= 0)
                <span class="text-center d-block mb-2">No categories yet</span>
            @endif

        </div>
    </div>
@endsection
