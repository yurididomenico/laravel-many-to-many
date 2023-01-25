@extends('layouts.dashboard')

@section('content')

<div class="text-center">

    <h1>Crea un Post</h1>

    <form action="{{ route('admin.posts.store') }}" method="POST" class="text-start py-4">

        @csrf

        <div class="my-4">
            <label class="form-label" for="">Titolo</label>
            <input class="form-control" type="text" name="title">
        </div>

        <div class="my-4">
            <label class="form-label" for="">Body</label>
            <textarea class="form-control" type="text" name="body"></textarea>
        </div>

        <div class="mb-4">
            <button type="submit" class="btn btn-primary">Crea</button>
        </div>


    </form>

</div>

@endsection
