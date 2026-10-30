@foreach (array_keys(\App\View\Components\Partials\Alert::TYPES) as $type)
    @if (session($type))
        <x-partials.alert :type="$type" dismissible class="mb-4">
            {{ session($type) }}
        </x-partials.alert>
    @endif
@endforeach
