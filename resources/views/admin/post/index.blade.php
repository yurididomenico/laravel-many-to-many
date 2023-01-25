@extends('layouts.dashboard')

@section('content')

    <h1>Posts</h1>

    @foreach ($posts as $post)
        {{ $post->title }} <br>
    @endforeach

@endsection
