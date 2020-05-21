<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
                <div>
                    <label for="title">Titolo</label>
                    <input type="text" placeholder="Inserisci il titolo" name="title" value="{{ (!empty(old('title') )) ? old('title') : $post->title }}">
                </div>
                <div>
                    <label for="author">Autore</label>
                    <input type="text" placeholder="Inserisci il nome dell'autore" name="author" value="{{ $post->author }}">
                </div>
                <div>
                    <label for="img">Immagine</label>
                    <input type="text" placeholder="Inserisci il path" name="img" value=" {{ $post->img }}">
                </div>
                <div>
                    <label for="not-pub">Non Pubblicato</label>
                    <input type="radio" id="not-published" name="published" value="0" {{ ($post->published == 0) ? 'checked' : ''}} >
                    <label for="pub">Pubblicato</label>
                    <input type="radio" id="published" name="published" value="1" {{ ($post->published == 1) ? 'checked' : ''}} >
                </div>
                <div>
                    <label for="body">Testo</label>
                    <textarea name="body" rows="8" cols="80"></textarea>
                </div>
                <div>
                    <input type="submit" value="salva">
                </div>
        </form>
    </body>
</html>
