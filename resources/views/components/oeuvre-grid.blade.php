@props(['oeuvres'])
<div class="grid gap-4 grid-cols-1 md:grid-cols-3">
    @foreach ($oeuvres as $oeuvre)
        <x-oeuvre-card :oeuvre="$oeuvre" />
    @endforeach
</div>
