<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 text-gray-900 antialiased">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="min-h-screen flex flex-col">

            <!-- Header -->
            <header class="bg-white shadow-sm">
                <div class="container mx-auto flex justify-between items-center px-6 py-4">
                    <a href="#" class="text-2xl font-bold text-gray-800">
                        Boutique Laravel
                    </a>
                    @if (Route::has('login'))
                        <nav class="flex space-x-4">
                            @auth
                                <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-600 hover:text-gray-800">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 hover:text-gray-800">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-sm font-medium text-gray-600 hover:text-gray-800">Register</a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1">
                <div class="container mx-auto px-6 py-10">
                    <h1 class="text-3xl font-bold text-gray-800 mb-8">Articles disponibles</h1>
                    
                    <!-- Articles Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($articles as $article)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                <div class="p-6">
                                    <h2 class="text-xl font-semibold text-gray-800">{{ $article->nom }}</h2>
                                    <p class="mt-2 text-gray-600">{{ $article->description }}</p>
                                    <p class="mt-4 text-lg font-bold text-gray-900">Prix : {{ $article->prix }} €</p>
                                    <p class="mt-2 text-sm text-gray-500">Stock : {{ $article->stock }}</p>
                                    <a href="{{ route('commande.create', ['id' => $article->id]) }}" class="btn btn-primary">Commander</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-gray-800 text-white">
                <div class="container mx-auto px-6 py-6">
                    <p class="text-center text-sm">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) &copy; {{ date('Y') }} - Boutique Laravel
                    </p>
                </div>
            </footer>
        </div>
    </body>
</html>
