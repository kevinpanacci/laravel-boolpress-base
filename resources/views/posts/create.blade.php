<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            @method('POST')
                <div>
                    <label for="title">Titolo</label>
                    <input type="text" placeholder="Inserisci il titolo" name="title" value="{{ old('title') }}">
                </div>
                <div>
                    <label for="author">Autore</label>
                    <input type="text" placeholder="Inserisci il nome dell'autore" name="author" value="{{ old('author') }}">
                </div>
                <div>
                    <label for="img">Immagine</label>
                    <input type="text" placeholder="Inserisci il path" name="img" value="{{ old('img') }}">
                </div>
                <div>
                    <label for="not-pub">Non Pubblicato</label>
                    <input type="radio" id="not-published" name="published" value="0" {{(old('published') == 0) ? 'checked' : ''}}>
                    <label for="pub">Pubblicato</label>
                    <input type="radio" id="published" name="published" value="1" {{(old('published') == 1) ? 'checked' : ''}}>
                </div>
                <div>
                    <label for="body">Testo</label>
                    <textarea name="body" rows="8" cols="80" {{ (!empty(old('body'))) ? old('body') : 'Inserisci un testo' }}></textarea>
                </div>
                <div>
                    <input type="submit" value="salva">
                </div>
        </form>
    </body>
</html>
