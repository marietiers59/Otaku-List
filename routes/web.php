<?php

use App\Http\Controllers\OeuvreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/oeuvres', [OeuvreController::class, 'index'])->name('oeuvres.index');

Route::view('/contact', 'contact')->name('contact');
