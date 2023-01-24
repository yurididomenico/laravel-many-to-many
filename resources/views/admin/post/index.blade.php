@extends('layouts.app')

@section('content')

    <h1>Posts</h1>

    <h3>ID: {{ $userId }}</h3>
    <h3>Nome: {{ $user->name }}</h3>

@endsection
