<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4">Utilisateurs</h1>

    <table class="w-full max-w-3xl rounded bg-white shadow">
        <thead class="border-b text-left">
        <tr><th class="p-3">Nom</th><th class="p-3">E-mail</th><th class="p-3">Rôle</th></tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr class="border-b last:border-0">
                <td class="p-3">{{ $user->name }}</td>
                <td class="p-3">{{ $user->email }}</td>
                <td class="p-3">{{ $user->role }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-layouts.app>
