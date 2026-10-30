<?php

namespace Database\Seeders;

use App\Models\Oeuvre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class OeuvreSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('seeders/data/oeuvres.json');

        if (File::exists($path)) {
            $oeuvres = json_decode(File::get($path), true);
            foreach ($oeuvres as $oeuvre) {
                Oeuvre::create($oeuvre);
            }
        } else {
            Oeuvre::factory(20)->create();
        }
    }
}
