@extends("layouts.dashboard")

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Archivio post</h1>
                    <a class="btn btn-primary" href="{{ route("admin.posts.create") }}">Crea nuovo post</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titolo</th>
                            <th>Slug</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route("admin.posts.show", ["post" => $post->id])}}">Dettagli</a>
                                    <a class="btn btn-warning" href="{{ route("admin.posts.edit", ["post" => $post->id]) }}">Modifica</a>
                                    <form class="" action="{{ route("admin.posts.destroy", ["post" => $post->id]) }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <input type="submit" class="btn btn-danger" value="Elimina">
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>
                                    Non ci sono post in archivio
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
