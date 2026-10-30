@props(['oeuvre' => null])

<div>
    <label for="titre" class="block text-sm font-medium">Titre</label>
    <input id="titre" name="titre" type="text" value="{{ old('titre', $oeuvre?->titre) }}" required
           class="mt-1 w-full rounded border border-gray-300 p-2">
</div>

<div>
    <label for="synopsis" class="block text-sm font-medium">Synopsis</label>
    <textarea id="synopsis" name="synopsis" rows="4" required
              class="mt-1 w-full rounded border border-gray-300 p-2">{{ old('synopsis', $oeuvre?->synopsis) }}</textarea>
</div>

<div class="grid gap-4 md:grid-cols-3">
    <div>
        <label for="annee" class="block text-sm font-medium">Année</label>
        <input id="annee" name="annee" type="number" value="{{ old('annee', $oeuvre?->annee) }}" required
               class="mt-1 w-full rounded border border-gray-300 p-2">
    </div>
    <div>
        <label for="status" class="block text-sm font-medium">Statut</label>
        <select id="status" name="status" required class="mt-1 w-full rounded border border-gray-300 p-2">
            @foreach (['en_cours' => 'En cours', 'termine' => 'Terminé', 'a_venir' => 'À venir'] as $valeur => $libelle)
                <option value="{{ $valeur }}" @selected(old('status', $oeuvre?->status) === $valeur)>{{ $libelle }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="nb_episodes_tomes" class="block text-sm font-medium">Épisodes ou tomes</label>
        <input id="nb_episodes_tomes" name="nb_episodes_tomes" type="number" min="1"
               value="{{ old('nb_episodes_tomes', $oeuvre?->nb_episodes_tomes) }}"
               class="mt-1 w-full rounded border border-gray-300 p-2">
    </div>
</div>

<div class="grid gap-4 md:grid-cols-2">
    <div>
        <label for="studio" class="block text-sm font-medium">Studio</label>
        <input id="studio" name="studio" type="text" value="{{ old('studio', $oeuvre?->studio) }}" required
               class="mt-1 w-full rounded border border-gray-300 p-2">
    </div>
    <div>
        <label for="note" class="block text-sm font-medium">Note (de 0 à 5)</label>
        <input id="note" name="note" type="number" step="0.1" min="0" max="5"
               value="{{ old('note', $oeuvre?->note) }}" required
               class="mt-1 w-full rounded border border-gray-300 p-2">
    </div>
</div>

<div>
    <label for="image" class="block text-sm font-medium">Adresse de l'image (facultatif)</label>
    <input id="image" name="image" type="url" value="{{ old('image', $oeuvre?->image) }}"
           class="mt-1 w-full rounded border border-gray-300 p-2">
</div>
