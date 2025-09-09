<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;

class LivreController extends Controller
{
    public function index()
    {
        $livres = Livre::all();
        return view('livres.index', compact('livres'));
    }

    public function create()
    {
        return view('livres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'auteur' => 'required',
            'categorie' => 'required',
            'annee_publication' => 'required|digits:4|integer',
            'resume' => 'required',
            'prix' => 'required|numeric',
        ]);

        Livre::create($request->all());
        return redirect()->route('livres.index')->with('success', 'Livre ajouté !');
    }

    public function show(Livre $livre)
    {
        return view('livres.show', compact('livre'));
    }

    public function destroy(Livre $livre)
    {
        $livre->delete();
        return redirect()->route('livres.index')->with('success', 'Livre supprimé !');
    }

public function searchForm()
{
    return view('livres.search');
}

public function search(Request $request)
{
    $query = Livre::query();

    if ($request->titre) {
        $query->where('titre', 'like', "%{$request->titre}%");
    }
    if ($request->auteur) {
        $query->where('auteur', 'like', "%{$request->auteur}%");
    }
    if ($request->categorie) {
        $query->where('categorie', 'like', "%{$request->categorie}%");
    }
    if ($request->annee_publication) {
        $query->where('annee_publication', $request->annee_publication);
    }
    if ($request->prix_min) {
        $query->where('prix', '>=', $request->prix_min);
    }
    if ($request->prix_max) {
        $query->where('prix', '<=', $request->prix_max);
    }

    $livres = $query->get();

    return view('livres.search', compact('livres'));
}


    public function nouveautes()
    {
        $livres = Livre::where('created_at', '>=', now()->subDays(10))->get();
        return view('livres.nouveautes', compact('livres'));
    }

    public function edit(Livre $livre)
    {
        return view('livres.edit', compact('livre'));
    }

    public function update(Request $request, Livre $livre)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'categorie' => 'required|string|max:255',
            'annee_publication' => 'required|integer',
            'resume' => 'required|string',
            'prix' => 'required|numeric',
        ]);

        $livre->update($request->all());

        return redirect()->route('livres.index')->with('success', 'Livre mis à jour avec succès.');
    }
}
