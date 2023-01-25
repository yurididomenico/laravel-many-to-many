@extends('layouts.dashboard')

@section('content')

    <h1 class="text-center p-3">Posts</h1>

    <div class="pb-3">
        <a href="{{ route('admin.posts.create') }}">Crea un nuovo Post</a>
    </div>

    <table class="table pt-3">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>
                    <a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a>
                </td>
                <td>{{ $post->body }}</td>
                <td>
                    <a href="{{ route('admin.posts.edit', $post->id) }}">
                        Edit
                    </a>
                    {{-- <a href="{{ route('admin.posts.delete', $post->id) }}">
                        Delete
                    </a> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>


@endsection
