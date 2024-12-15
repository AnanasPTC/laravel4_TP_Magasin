@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bienvenue, {{ Auth::user()->nom }}</h1>
    <p>Ceci est votre tableau de bord.</p>
</div>

<div>
    <h2>Commandes</h2>
    @forelse ($commandes as $commande)
        <h3>Commande du {{ $commande->date }} - Total : {{ $commande->montant_total }} €</h3>
        <ul>
            @foreach ($commande->articles as $article)
                <li>{{ $article->nom }} (Quantité : {{ $article->pivot->quantity }})</li>
            @endforeach
        </ul>
    @empty
        <p>Aucune commande passée.</p>
    @endforelse
</div>
@endsection
