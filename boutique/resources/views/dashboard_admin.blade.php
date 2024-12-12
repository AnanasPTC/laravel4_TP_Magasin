@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tableau de bord administrateur</h1>
    <a href="{{ route('articles.create') }}" class="btn btn-primary">Ajouter un article</a>
</div>
@endsection
