<?php

use App\Http\Controllers\OeuvreController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'accueil')->name('accueil');
Route::view('/presentation', 'presentation')->name('presentation');

Route::resource('oeuvres', OeuvreController::class);

Route::view('/contact', 'contact')->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfilController::class, 'show'])->name('profil.show');
    Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('/profil', [ProfilController::class, 'update'])->name('profil.update');
});
