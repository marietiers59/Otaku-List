@props(['oeuvre'])
<div x-data="{ confirmer: false }">
    <button type="button" @click="confirmer = true"
            class="rounded border border-red-600 px-3 py-1 text-sm text-red-600 hover:bg-red-50">
        <i class="fa-solid fa-trash"></i> Supprimer
    </button>

    <div x-show="confirmer" x-cloak x-transition.opacity
         @keydown.escape.window="confirmer = false"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div @click.outside="confirmer = false" class="w-full max-w-sm rounded bg-white p-6 shadow-lg">
            <p class="mb-4">Supprimer « {{ $oeuvre->titre }} » ? Cette action est définitive.</p>
            <div class="flex justify-end gap-2">
                <button type="button" @click="confirmer = false" class="rounded border px-4 py-2">Annuler</button>
                <form method="POST" action="{{ route('oeuvres.destroy', $oeuvre) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rounded bg-red-600 px-4 py-2 text-white hover:bg-red-700">
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
