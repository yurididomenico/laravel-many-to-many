@extends('layouts.dashboard')

@section('content')

<div class="text-center">

    <h1>{{ $singolo_post->title }}</h1>

    <img class="img-fluid" src="{{ asset("storage/$singolo_post->cover") }}" alt="">

    <p class="fs-2 my-4">
        {{ $singolo_post->body }}
    </p>

</div>

@endsection
