@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $article->nom }}</h1>
    <p>{{ $article->description }}</p>
    <p>Prix : {{ $article->prix }} €</p>
    <p>Stock : {{ $article->stock }}</p>
    <a href="{{ url('/') }}" class="btn btn-primary">Retour à la liste des articles</a>
</div>
@endsection
