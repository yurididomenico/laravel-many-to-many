@extends('layouts.dashboard')

@section('content')
    <h1>Posts</h1>

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
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td>icone</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
@endsection
