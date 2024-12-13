@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier l'Article</h1>
    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" id="nom" name="nom" class="form-control" value="{{ $article->nom }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control">{{ $article->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="number" step="0.01" id="prix" name="prix" class="form-control" value="{{ $article->prix }}" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" id="stock" name="stock" class="form-control" value="{{ $article->stock }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>
@endsection
