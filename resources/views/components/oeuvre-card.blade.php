@props(['oeuvre'])
<div class="flex flex-col justify-between rounded bg-white p-4 shadow hover:shadow-md">
    <a href="{{ route('oeuvres.show', $oeuvre) }}" class="block">
        <h2 class="font-bold">{{ $oeuvre->titre }} ({{ $oeuvre->annee }})</h2>
        <p class="text-sm">{{ $oeuvre->studio }} - {{ \App\Models\Oeuvre::STATUTS[$oeuvre->status] ?? $oeuvre->status }} - {{ $oeuvre->note }}/5</p>
    </a>
    @can('update', $oeuvre)
        <div class="mt-3 flex gap-2">
            <a href="{{ route('oeuvres.edit', $oeuvre) }}" class="rounded border px-3 py-1 text-sm">
                <i class="fa-solid fa-pen"></i> Modifier
            </a>
            <x-oeuvre-delete :oeuvre="$oeuvre" />
        </div>
    @endcan
</div>
