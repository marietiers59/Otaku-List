<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4">Mon profil</h1>

    <div class="max-w-md space-y-2 rounded bg-white p-6 shadow">
        <p><span class="font-medium">Nom :</span> {{ $user->name }}</p>
        <p><span class="font-medium">Adresse e-mail :</span> {{ $user->email }}</p>
        <p><span class="font-medium">Inscrit depuis le :</span> {{ $user->created_at->format('d/m/Y') }}</p>

        <a href="{{ route('profil.edit') }}" class="inline-block mt-4 rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
            <i class="fa-solid fa-pen"></i> Modifier
        </a>
    </div>
</x-layouts.app>
