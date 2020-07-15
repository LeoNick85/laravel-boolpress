@extends("layouts.app")

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex flex-column">
                <h1>Dettagli articolo</h1>
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
                <p>Categoria:
                    @if ($post->category)
                        <a href="{{ route("categories.show", ["slug"=>$post->category->slug]) }}">
                        {{ $post->category->name ?? ""}}
                        </a>
                    @else
                        -
                    @endif
                </p>
                <p><strong>Tags:</strong>
                    @foreach ($post->tags as $tag)
                        {{ $tag->name }} {{ $loop->last ? "" : ", "}}
                    @endforeach
                </p>
                <p>Data Creazione Post: {{ $post->created_at }}</p>
                <p>Data ultimo aggiornamento: {{ $post->updated_at }}</p>
            </div>
        </div>
    </div>
@endsection
