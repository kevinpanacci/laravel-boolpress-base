<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>

        <h1>{{$post->title}}</h2>
        <small>Scritto da: {{$post->author}}</small>
        <div>
            body message: {{$post->body}}
        </div>
        {{-- <img src="{{$post->img}}" alt="{{$post->title}}"> --}}

    </body>
</html>
