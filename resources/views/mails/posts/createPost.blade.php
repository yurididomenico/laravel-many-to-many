<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body
        {
            background-color: lightcyan;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Post Creato con successo!</h1>
    <h2>{{ $post->title }}</h2>
    <p>Descrizione:
        {{ $post->body }}
    </p>
    <p>Catagoria:
        {{ $post->category->name }}
    </p>
    <p>
        @foreach ($post->tags as $elem)
            <li>{{ $elem->name }}</li>
        @endforeach
    </p>
</body>
</html>
