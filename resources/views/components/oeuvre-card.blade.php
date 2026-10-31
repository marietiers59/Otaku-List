@props(['oeuvre'])
<a href="{{ route('oeuvres.show', $oeuvre) }}" class="block p-4 bg-white rounded shadow hover:shadow-md">
    <h2 class="font-bold">{{ $oeuvre->titre }} ({{ $oeuvre->annee }})</h2>
    <p class="text-sm">{{ $oeuvre->studio }} - {{ \App\Models\Oeuvre::STATUTS[$oeuvre->status] ?? $oeuvre->status }} - {{ $oeuvre->note }}/5</p>
</a>
