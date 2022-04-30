@extends('layouts.app')


@section('content')
    <div class="mb-2 d-flex justify-content-end align-items-center">
        <a href="{{ route('tags.create') }}" class="btn btn-primary">+Add Tag</a>
    </div>
    <div class="card card-default">
        <div class="card-header h3">
            All Tags
        </div>
        <div class="card-body p-0">

            <table class="table">
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>
                                {{ $tag->name }}
                                <span class="badge bg-dark text-light ml-3">
                                    {{ $tag->posts->count() }}
                                </span>
                            </td>
                            <td class="d-flex justify-content-end align-items-center" style="gap: 10px">
                                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-sm btn-success">Edit</a>

                                <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if (count($tags) <= 0)
                <span class="text-center d-block mb-2">No tags yet</span>
            @endif

        </div>
    </div>
@endsection
