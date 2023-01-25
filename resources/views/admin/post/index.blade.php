@extends('layouts.dashboard')

@section('content')

    <a href="{{ route('admin.post.create') }}"> + </a>

    <table class="table">
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
                    <a href="{{ route('admin.post.edit', $post->id) }}">
                        Edit
                    </a>
                    {{-- <a href="{{ route('admin.post.delete', $post->id) }}">
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
