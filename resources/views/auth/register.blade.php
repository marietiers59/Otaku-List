<x-layouts.guest>
    <h1 class="text-2xl font-bold mb-4">Inscription</h1>

    <form method="POST" action="{{ route('register') }}" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium">Nom</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                   class="mt-1 w-full rounded border border-gray-300 p-2">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium">Adresse e-mail</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required
                   class="mt-1 w-full rounded border border-gray-300 p-2">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium">Mot de passe</label>
            <input id="password" name="password" type="password" required
                   class="mt-1 w-full rounded border border-gray-300 p-2">
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium">Confirmation du mot de passe</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required
                   class="mt-1 w-full rounded border border-gray-300 p-2">
        </div>

        <button type="submit" class="w-full rounded bg-blue-600 p-2 text-white hover:bg-blue-700">
            Créer mon compte
        </button>

        <p class="text-sm text-center">
            Déjà inscrit ? <a href="{{ route('login') }}" class="text-blue-600 underline">Connectez-vous</a>
        </p>
    </form>
</x-layouts.guest>
