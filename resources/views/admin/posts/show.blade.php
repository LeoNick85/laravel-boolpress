@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="d-flex flex-column">
                <h1>Dettagli articolo</h1>
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
                <p>Categoria: {{ $post->category->name ?? ""}}</p>
                <p>Data Creazione Post: {{ $post->created_at }}</p>
                <p>Data ultimo aggiornamento: {{ $post->updated_at }}</p>
            </div>
        </div>
    </div>
@endsection
