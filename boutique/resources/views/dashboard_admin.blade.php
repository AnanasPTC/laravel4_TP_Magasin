@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bienvenue, {{ Auth::user()->nom }}</h1>
    <p>Ceci est votre tableau de bord.</p>
</div>

@endsection
