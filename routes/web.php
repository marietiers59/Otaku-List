<?php

use App\Http\Controllers\OeuvreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/oeuvres', [OeuvreController::class, 'index'])->name('oeuvres.index');

Route::view('/contact', 'contact')->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfilController::class, 'show'])->name('profil.show');
    Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('/profil', [ProfilController::class, 'update'])->name('profil.update');
});
