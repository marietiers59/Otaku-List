<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('oeuvres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('synopsis');
            $table->integer('annee');
            $table->enum('status', ['en_cours', 'termine', 'a_venir']);
            $table->integer('nb_episodes_tomes')->nullable();
            $table->string('studio');
            $table->string('image')->nullable();
            $table->float('note')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('oeuvres');
    }
};
