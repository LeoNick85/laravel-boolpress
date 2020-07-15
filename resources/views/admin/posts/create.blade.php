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
        <div class="form-group">
            <label for="categoria">Categoria articolo</label>
            <select class="form-control" id="categoria" name="category_id">
                <option value="">Seleziona categoria</option>
                @foreach ($categories as $category)
                    <option {{ old("category_id") == $category->id ? "selected" : ""}} value="{{$category->id}}">
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
        </div>
        @foreach ($tags as $tag)
            <div class="form-group">
            <label for="testo">
                <input
                {{ in_array($tag->id, old("tags", [])) ? "checked" : "" }}
                type="checkbox" name="tags[]" class="form-check-input" value="{{ $tag->id }}">
                {{ $tag->name }}
            </label>
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection
