<div {{ $attributes->merge(['class' => "rounded-lg border p-4 $containerClasses"]) }}
     @if ($dismissible) x-data="{ show: true }" x-show="show" x-transition @endif>
    <div class="flex items-start gap-3">
        <i class="{{ $iconClasses }} mt-0.5"></i>
        <div class="flex-1 text-sm">
            @if ($title)
                <p class="font-semibold">{{ $title }}</p>
            @endif
            <div>{{ $slot }}</div>
        </div>
        @if ($dismissible)
            <button type="button" @click="show = false" class="opacity-60 hover:opacity-100">
                <i class="fa-solid fa-xmark"></i>
                <span class="sr-only">Fermer</span>
            </button>
        @endif
    </div>
</div>
