<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4">Ajouter une oeuvre</h1>

    <form method="POST" action="{{ route('oeuvres.store') }}" class="max-w-2xl space-y-4 rounded bg-white p-6 shadow">
        @csrf
        <x-oeuvre-fields />
        <div class="flex gap-2">
            <button type="submit" class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Enregistrer</button>
            <a href="{{ route('oeuvres.index') }}" class="rounded border px-4 py-2">Annuler</a>
        </div>
    </form>
</x-layouts.app>
