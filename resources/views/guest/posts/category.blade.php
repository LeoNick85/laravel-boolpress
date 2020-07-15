@extends('layouts.app')

@section('content')
    <h1>Post contenuti nella categoria {{ $category->name }}</h1>
    <ul>
        @forelse ($posts as $post)
            <li>
                <a href="{{ route("posts.show", ["slug" => $post->slug]) }}">{{ $post->title }}</a>
            </li>
        @empty
            <li>Non sono presenti post per questa categoria</li>
        @endforelse
    </ul>
@endsection
