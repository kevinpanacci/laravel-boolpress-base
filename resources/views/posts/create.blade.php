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
        <form action="{{route('posts.store')}}" method="post">
            @csrf
            @method('POST')
                <div>
                    {{-- Il name dell'input deve corrispondere al nome nel db --}}
                    <label for="title">Titolo</label>
                    <input type="text" placeholder="Inserisci il titolo" name="title">
                    {{-- ERRORE PER TITOLO ERRATO/MANCANTE: --}}
                    @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <label for="author">Autore</label>
                    <input type="text" placeholder="Inserisci il nome dell'autore" name="author">
                </div>
                <div>
                    <label for="img">Immagine</label>
                    <input type="text" placeholder="Inserisci il path" name="img">
                </div>
                <div>
                    <label for="not-pub">Non Pubblicato</label>
                    <input type="radio" id="not-published" name="published" value="0">
                    <label for="pub">Pubblicato</label>
                    <input type="radio" id="published" name="published" value="1">
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
