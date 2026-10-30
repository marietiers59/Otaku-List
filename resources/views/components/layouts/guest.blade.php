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
    <a href="/"><i class="fa-solid fa-house"></i> OtakuList</a>
</header>

<main class="mx-auto max-w-md p-4">
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
</body>
</html>
