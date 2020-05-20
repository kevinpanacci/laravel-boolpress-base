<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <div>
            <table class="table">
                <thead>
                    <th>Titolo</th>
                    <th>Autore</th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td><a href="{{route('posts.show', $post->slug)}}">{{$post->title}}</a></td>
                            <td><small>Scritto da {{$post->author}}</small></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
