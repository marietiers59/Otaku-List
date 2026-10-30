<x-layouts.app>
    <div class="mb-4 flex items-center justify-between">
        <h1 class="text-2xl font-bold">Les oeuvres</h1>
        <a href="{{ route('oeuvres.create') }}" class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
            <i class="fa-solid fa-plus"></i> Ajouter une oeuvre
        </a>
    </div>
    <x-oeuvre-grid :oeuvres="$oeuvres" />
</x-layouts.app>
