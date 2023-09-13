<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommandeCollection;
use App\Http\Resources\CommandeResource;
use App\Models\Commande;
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
    public function store(Request $request)
    {
        $commande= commande::firstOrCreate([
            'date_commande' => $request->date_commande,
            'reduction'=>$request->	reduction,
            'user_id'=>$request->user_id,
            'client_id'=>$request->	client_id,
        ]);
        
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
