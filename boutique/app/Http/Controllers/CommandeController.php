<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $article = Article::findOrFail($id); // Trouve l'article par son ID ou retourne une erreur 404
        return view('commande.create', compact('article'));
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $article = Article::findOrFail($request->article_id);

        $commande = Commande::create([
            'date' => now(),
            'montant_total' => $article->prix * $request->quantity,
            'id_client' => auth()->id(),
        ]);

        $commande->Article()->attach($article->id, ['quantity' => $request->quantity]);

        return redirect()->route('commande.index')->with('success', 'Commande créée avec succès !');
    }

    
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $commande = Commande::findOrFail($id);
        return view('commandes.show', compact('commande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
