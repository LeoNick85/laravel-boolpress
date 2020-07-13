@extends("layouts.dashboard")

@section('content')
    <h1>Crea nuovo post</h1>
    <form  action="{{ route("admin.posts.store") }}" method="post">
        @csrf
        <div class="form-group">
            <label for="titolo">Titolo</label>
            <input type="text" name="title" class="form-control" id="titolo" placeholder="Inserisci il titolo" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="testo">Testo articolo</label>
            <input type="text" name="content" class="form-control" id="testo" placeholder="Inserisci il testo"  value="{{ old('content') }}">
        </div>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection
