@props(['oeuvre'])
<div class="p-4 bg-white rounded shadow">
    <h2 class="font-bold">{{ $oeuvre->titre }} ({{ $oeuvre->annee }})</h2>
    <p class="text-sm">{{ $oeuvre->studio }} - {{ $oeuvre->status }} - {{ $oeuvre->note }}/5</p>
</div>
