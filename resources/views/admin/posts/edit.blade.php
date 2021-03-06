@extends("layouts.dashboard")

@section('content')
    <h1>Modifica post</h1>
    <form  action="{{ route("admin.posts.update", ["post" => $post->id]) }}" method="post">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="titolo">Titolo</label>
            <input type="text" name="title" class="form-control" id="titolo" placeholder="Inserisci il titolo" value="{{ old('title', $post->title)}}">
        </div>
        <div class="form-group">
            <label for="testo">Testo articolo</label>
            <input type="text" name="content" class="form-control" id="testo" placeholder="Inserisci il testo"  value="{{ old('content', $post->content) }}">
        </div>
        <div class="form-group">
            <label for="categoria">Categoria articolo</label>
            <select class="form-control" id="categoria" name="category_id">
                <option value="">Seleziona categoria</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}"
                        {{ old("category_id", ($post->category->id ?? "")) == $category->id ? "selected" : ""}}>
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
        </div>
        @foreach ($tags as $tag)
            <div class="form-group">
            <label for="testo">
                <input
                    @if ($errors->any())
                        {{ in_array($tag->id, old("tags", [])) ? "checked" : "" }}
                    @else
                        {{ $post->tags->contains($tag) ? "checked" : "" }}
                    @endif
                    type="checkbox" name="tags[]" class="form-check-input" value="{{ $tag->id }}">
                    {{ $tag->name }}
            </label>
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection
