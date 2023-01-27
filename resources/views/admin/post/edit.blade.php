@extends('layouts.dashboard')

@section('content')

<div class="text-center">

    <h1>Modifica il Post {{ $post->title }}</h1>

    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" class="text-start py-4">

        @csrf
        @method('PUT')


        <div class="my-4">
            <label class="form-label" for="">Titolo</label>
            <input value="{{ $post->title }}" class="form-control" type="text" name="title">
            @error('title')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="my-4">
            <label class="form-label" for="">Body</label>
            <textarea class="form-control" type="text" name="body">{{ $post->body }}</textarea>
            @error('body')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="my-4">
            <label for="">Categories</label>
            <select name="category_id" class="form-control">
                <option value="">Seleziona la categoria</option>
                @foreach ($categories as $category)

                    <option value="{{ $category->id }}" {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>
        </div>

        <div class="my-4">
            <label for="">Tags:</label>
            @foreach ($tags as $tag)
                <label for="">
                    <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" {{ $post->tags->contains($tag) ? 'checked' : '' }}>
                    {{ $tag->name }}
                </label>
            @endforeach
        </div>

        <div class="mb-4">
            <button type="submit" class="btn btn-primary">Modifica</button>
        </div>


    </form>

</div>

@endsection
