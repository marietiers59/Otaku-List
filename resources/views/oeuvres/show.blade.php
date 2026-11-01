<x-layouts.app>
    <a href="{{ route('oeuvres.index') }}" class="text-blue-600 underline">
        <i class="fa-solid fa-arrow-left"></i> Retour à la liste
    </a>

    <div class="mt-4 grid gap-6 md:grid-cols-3">
        <div>
            @if ($oeuvre->image)
                <img src="{{ str_starts_with($oeuvre->image, 'http') ? $oeuvre->image : asset('storage/' . $oeuvre->image) }}"
                     alt="{{ $oeuvre->titre }}" class="w-full rounded shadow">
            @else
                <div class="flex aspect-[3/4] items-center justify-center rounded bg-gray-200 text-6xl text-gray-400">
                    <i class="fa-solid fa-image"></i>
                </div>
            @endif
        </div>

        <div class="md:col-span-2 space-y-2">
            <h1 class="text-3xl font-bold">{{ $oeuvre->titre }}</h1>
            <a href="{{ route('oeuvres.edit', $oeuvre) }}" class="inline-block rounded border px-3 py-1 text-sm">
                <i class="fa-solid fa-pen"></i> Modifier
            </a>
            <p><span class="font-medium">Année :</span> {{ $oeuvre->annee }}</p>
            <p><span class="font-medium">Statut :</span> {{ $oeuvre->status }}</p>
            <p><span class="font-medium">Studio :</span> {{ $oeuvre->studio }}</p>
            <p><span class="font-medium">Épisodes ou tomes :</span> {{ $oeuvre->nb_episodes_tomes ?? 'non renseigné' }}</p>
            <p><span class="font-medium">Note :</span> {{ $oeuvre->note }}/5</p>
            <h2 class="pt-4 text-lg font-semibold">Synopsis</h2>
            <p class="text-gray-700">{{ $oeuvre->synopsis }}</p>
        </div>
    </div>
</x-layouts.app>
