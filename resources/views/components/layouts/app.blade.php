<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OtakuList</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">
<header class="p-4 bg-white shadow">
    <nav class="flex items-center gap-4">
        <a href="/"><i class="fa-solid fa-house"></i> Accueil</a>
        <a href="{{ route('oeuvres.index') }}"><i class="fa-solid fa-book-open"></i> Oeuvres</a>

        <div class="ml-auto flex items-center gap-4">
            @guest
                <a href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i> Inscription</a>
                <a href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i> Connexion</a>
            @endguest

            @auth
                <div class="relative" x-data="{ open: false }">
                    <button type="button" @click="open = !open" class="flex items-center gap-2">
                        <i class="fa-solid fa-user"></i> {{ Auth::user()->name }}
                        <i class="fa-solid fa-caret-down"></i>
                    </button>
                    <div x-show="open" @click.outside="open = false"
                         class="absolute right-0 mt-2 w-48 rounded border bg-white shadow">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full px-4 py-2 text-left hover:bg-gray-100">
                                <i class="fa-solid fa-right-from-bracket"></i> Déconnexion
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </nav>
</header>

<main class="p-4">
    @if ($errors->any())
        <x-partials.alert type="error" title="Le formulaire contient des erreurs." class="mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-partials.alert>
    @endif

    {{ $slot }}
</main>

<footer class="p-4 text-sm text-center">OtakuList - Groupe B4</footer>
</body>
</html>
