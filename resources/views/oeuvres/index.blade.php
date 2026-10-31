<x-layouts.app>
    <div class="mb-4 flex items-center justify-between">
        <h1 class="text-2xl font-bold">Les oeuvres</h1>
        <a href="{{ route('oeuvres.create') }}" class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
            <i class="fa-solid fa-plus"></i> Ajouter une oeuvre
        </a>
    </div>
    <form method="GET" action="{{ route('oeuvres.index') }}"
          class="mb-6 flex flex-wrap items-end gap-4 rounded bg-white p-4 shadow">
        <div>
            <label for="status" class="block text-sm font-medium">Statut</label>
            <select id="status" name="status" class="mt-1 rounded border border-gray-300 p-2">
                <option value="">Tous</option>
                @foreach (\App\Models\Oeuvre::STATUTS as $valeur => $libelle)
                    <option value="{{ $valeur }}" @selected($filtres['status'] === $valeur)>{{ $libelle }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="annee" class="block text-sm font-medium">Année</label>
            <select id="annee" name="annee" class="mt-1 rounded border border-gray-300 p-2">
                <option value="">Toutes</option>
                @foreach ($annees as $annee)
                    <option value="{{ $annee }}" @selected($filtres['annee'] == $annee)>{{ $annee }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
            <i class="fa-solid fa-filter"></i> Filtrer
        </button>
        <a href="{{ route('oeuvres.index', ['status' => '', 'annee' => '']) }}" class="rounded border px-4 py-2">
            <i class="fa-solid fa-rotate-left"></i> Réinitialiser
        </a>
        <p class="ml-auto text-sm text-gray-500">{{ $oeuvres->count() }} oeuvre(s)</p>
    </form>

    @if ($oeuvres->isEmpty())
        <x-partials.alert type="info">Aucune oeuvre ne correspond à ce filtre.</x-partials.alert>
    @else
        <x-oeuvre-grid :oeuvres="$oeuvres" />
    @endif
</x-layouts.app>
