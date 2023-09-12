<?php

namespace App\Http\Controllers;

use App\Models\Succursale;
use Illuminate\Http\Request;
use App\Http\Requests\SuccursaleRequest;
use App\Http\Resources\SuccursaleCollection;
use App\Http\Resources\SuccursaleResource;

class SuccursaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $limit=3;
        return new SuccursaleCollection(Succursale::paginate($limit));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuccursaleRequest $request)
    {
        $succursale= Succursale::firstOrCreate([
            'nom' => $request->nom,
            'tel'=>$request->tel,
            'adresse'=>$request->adresse,
            'reduction'=>$request->reduction
        ]);
        return new SuccursaleResource('Ajout fait avec succès !',$succursale);
    }
    /**
     * Display the specified resource.
     */
    public function show($succursale)
    {
        $data=Succursale::where('nom',$succursale)->first();
        if ($data) {
            return new SuccursaleResource('',$data);
        }
        else{
            return new SuccursaleResource('Ce succursale n\'existe pas !');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Succursale $succursale)
    {
        $succursale->update($request->only('nom','tel','adresse','reduction'));
        return new SuccursaleResource('Succursale modifié avec succés !',$succursale);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Succursale $succursale)
    {
        $succursale->delete();
        return new SuccursaleResource('Succursale supprimé avec succés !',$succursale);
    }
}
