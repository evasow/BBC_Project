<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientCollection;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $limit=3;
        return new ClientCollection(Client::paginate($limit));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client= Client::firstOrCreate([
            'nomComplet' => $request->nomComplet,
            'adresse'=>$request->adresse
        ]);
        
        return new ClientResource('Client ajouté avec succès !',$client);
    }
    /**
     * Display the specified resource.
     */
    public function show($client)
    {
        $data=Client::where('nomComplet',$client)->first();
        if ($data) {
            return new ClientResource('',$data);
        }
        else{
            return new ClientResource('Ce Client n\'existe pas !');
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return new ClientResource('Client supprimé avec succés !',$client);
    }
}
