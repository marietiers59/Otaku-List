<?php

namespace App\Http\Controllers;

use App\Models\Oeuvre;

class OeuvreController extends Controller
{
    public function index()
    {
        $oeuvres = Oeuvre::orderBy('titre')->get();

        return view('oeuvres.index', compact('oeuvres'));
    }

    public function show(Oeuvre $oeuvre)
    {
        return view('oeuvres.show', compact('oeuvre'));
    }
}
