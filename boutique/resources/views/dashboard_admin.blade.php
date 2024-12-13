@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tableau de bord administrateur</h1>
    <a href="{{ route('articles.create') }}" class="btn btn-primary mb-4">Ajouter un article</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix (€)</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->nom }}</td>
                    <td>{{ $article->description }}</td>
                    <td>{{ $article->prix }}</td>
                    <td>{{ $article->stock }}</td>
                    <td>
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
