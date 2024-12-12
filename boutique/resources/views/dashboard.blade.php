@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bienvenue, {{ Auth::user()->nom }}</h1>
    <p>Ceci est votre tableau de bord.</p>
</div>
<div>
    <h2>Commande</h2>
    <ul>
        @foreach($commande->articles as $article)
            <li>
                {{ $article->name }}
            </li>
        @endforeach
    </ul>
    

</div>
@endsection
