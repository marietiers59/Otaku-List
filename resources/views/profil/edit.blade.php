<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4">Modifier mon profil</h1>

    <form method="POST" action="{{ route('profil.update') }}" class="max-w-md space-y-4 rounded bg-white p-6 shadow">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium">Nom</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required
                   class="mt-1 w-full rounded border border-gray-300 p-2">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium">Adresse e-mail</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required
                   class="mt-1 w-full rounded border border-gray-300 p-2">
        </div>

        <p class="text-sm text-gray-500">Laissez les champs ci-dessous vides pour garder votre mot de passe.</p>

        <div>
            <label for="current_password" class="block text-sm font-medium">Mot de passe actuel</label>
            <input id="current_password" name="current_password" type="password"
                   class="mt-1 w-full rounded border border-gray-300 p-2">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium">Nouveau mot de passe</label>
            <input id="password" name="password" type="password"
                   class="mt-1 w-full rounded border border-gray-300 p-2">
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium">Confirmation du nouveau mot de passe</label>
            <input id="password_confirmation" name="password_confirmation" type="password"
                   class="mt-1 w-full rounded border border-gray-300 p-2">
        </div>

        <div class="flex gap-2">
            <button type="submit" class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Enregistrer</button>
            <a href="{{ route('profil.show') }}" class="rounded border px-4 py-2">Annuler</a>
        </div>
    </form>
</x-layouts.app>
