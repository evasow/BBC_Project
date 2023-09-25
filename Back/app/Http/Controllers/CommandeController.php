<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommandeRequest;
use App\Http\Resources\CommandeCollection;
use App\Http\Resources\CommandeResource;
use App\Models\Commande;
use App\Models\ProduitSuccursale;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $limit=3;
        return new CommandeCollection(Commande::paginate($limit));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommandeRequest $request)
    {
        $commande= Commande::firstOrCreate([
            'date_commande' => now(),
            'reduction'=>$request->	reduction,
            'user_id'=>$request->user_id,
            'client_id'=>$request->	client_id,
        ]);
        $produits_succursale=array_map(function($object){
            unset($object['produit']);
            return $object;
        },$request->produits_succursale);
        
        $commande->produits_succursale()->attach($produits_succursale);

        foreach ($produits_succursale as $value) {
            $produitSucc=ProduitSuccursale::where('id',$value['produit_succursale_id'])->first();
            $produitSucc->update(['quantite_stock'=>$produitSucc->quantite_stock-$value['quantite']]);
        }
        return new CommandeResource('commande ajouté avec succès !',$commande);
    }

    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        //
    }
}
