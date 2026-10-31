<?php

namespace App\Http\Controllers;

use App\Models\Oeuvre;
use Illuminate\Http\Request;

class OeuvreController extends Controller
{
    public function index(Request $request)
    {
        $source = $request->query();

        // On garde seulement les valeurs valides : un statut connu, une année entière
        $filtres = [
            'status' => in_array($source['status'] ?? null, array_keys(Oeuvre::STATUTS), true) ? $source['status'] : null,
            'annee' => filter_var($source['annee'] ?? null, FILTER_VALIDATE_INT) ?: null,
        ];

        $oeuvres = Oeuvre::filtre($filtres['status'], $filtres['annee'])->orderBy('titre')->get();
        $annees = Oeuvre::orderByDesc('annee')->distinct()->pluck('annee');

        return view('oeuvres.index', compact('oeuvres', 'filtres', 'annees'));
    }

    public function show(Oeuvre $oeuvre)
    {
        return view('oeuvres.show', compact('oeuvre'));
    }

    public function create()
    {
        return view('oeuvres.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => ['required', 'string', 'max:255'],
            'synopsis' => ['required', 'string'],
            'annee' => ['required', 'integer', 'between:1900,2100'],
            'status' => ['required', 'in:en_cours,termine,a_venir'],
            'nb_episodes_tomes' => ['nullable', 'integer', 'min:1'],
            'studio' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'url', 'max:255'],
            'note' => ['required', 'numeric', 'between:0,5'],
        ]);

        Oeuvre::create($validated);

        return redirect()->route('oeuvres.index')->with('success', 'Oeuvre créée avec succès.');
    }
}
