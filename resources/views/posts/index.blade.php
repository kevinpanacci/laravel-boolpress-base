<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <div>
            <table>
                <thead>
                    <th>Titolo</th>
                    <th>Autore</th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td> {{$post->title}} </td>
                            <td><small>Scritto da {{ $post->author }}</small></td>
                            <td><a href="{{ route('posts.edit', $post->id) }}">Modifica</a></td>
                            <td><a href="{{ route('posts.show', $post->slug) }}">Visualizza</a></td>
                            <td><form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit">Elimina</button>
                            </form> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
