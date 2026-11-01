<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create(['name' => 'Utilisateur Test', 'email' => 'test@example.com']);
        User::factory()->create(['name' => 'Contributeur Test', 'email' => 'contributeur@example.com', 'role' => 'contributeur']);
        User::factory()->create(['name' => 'Admin Test', 'email' => 'admin@example.com', 'role' => 'admin']);
    }
}
