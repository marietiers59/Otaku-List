<x-layouts.guest>
    <h1 class="text-2xl font-bold mb-4">Connexion</h1>

    <form method="POST" action="{{ route('login') }}" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium">Adresse e-mail</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                   class="mt-1 w-full rounded border border-gray-300 p-2">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium">Mot de passe</label>
            <input id="password" name="password" type="password" required
                   class="mt-1 w-full rounded border border-gray-300 p-2">
        </div>

        <label class="flex items-center gap-2 text-sm">
            <input type="checkbox" name="remember"> Rester connecté
        </label>

        <button type="submit" class="w-full rounded bg-blue-600 p-2 text-white hover:bg-blue-700">
            Se connecter
        </button>

        <p class="text-sm text-center">
            Pas encore inscrit ? <a href="{{ route('register') }}" class="text-blue-600 underline">Inscrivez-vous</a>
        </p>
    </form>
</x-layouts.guest>
