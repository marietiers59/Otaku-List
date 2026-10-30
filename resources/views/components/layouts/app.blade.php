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
    <nav class="flex gap-4">
        <a href="/">Accueil</a>
        <a href="{{ route('oeuvres.index') }}">Oeuvres</a>
    </nav>
</header>
<main class="p-4">{{ $slot }}</main>
<footer class="p-4 text-sm text-center">OtakuList - Groupe B4</footer>
</body>
</html>
