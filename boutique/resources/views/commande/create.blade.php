@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Commander {{ $article->nom }}</h1>
    <form method="POST" action="{{ route('commande.store') }}">
        @csrf
        <p>Prix : {{ $article->prix }} €</p>
        <div class="form-group">
            <label for="quantity">Quantité :</label>
            <input type="number" id="quantity" name="quantity" min="1" class="form-control" required>
        </div>
        <input type="hidden" name="article_id" value="{{ $article->id }}">
        <button type="submit" class="btn btn-primary">Commander</button>
    </form>
</div>
@endsection
