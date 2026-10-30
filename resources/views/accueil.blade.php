<x-layouts.app>
    <section class="py-12 text-center">
        <h1 class="text-4xl font-bold mb-4">Bienvenue sur OtakuList</h1>
        <p class="text-lg text-gray-600 mb-8">
            Découvrez des animes et des mangas, suivez vos lectures et partagez vos avis.
        </p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('oeuvres.index') }}" class="rounded bg-blue-600 px-6 py-3 text-white hover:bg-blue-700">
                <i class="fa-solid fa-book-open"></i> Voir les oeuvres
            </a>
            @guest
                <a href="{{ route('register') }}" class="rounded border border-blue-600 px-6 py-3 text-blue-600 hover:bg-blue-50">
                    <i class="fa-solid fa-user-plus"></i> Créer un compte
                </a>
            @endguest
        </div>
    </section>
</x-layouts.app>
