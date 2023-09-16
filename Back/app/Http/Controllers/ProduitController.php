<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitRequest;
use App\Http\Resources\ProduitResource;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ProduitRequest $request)
    {

        return DB::transaction(function () use ($request){
            $produit= Produit::firstOrCreate([
                'libelle' => $request->libelle,
                'code'=>$request->code,
                'description'=>$request->description,
                'photo'=>$request->photo
            ]);
    
            $produit->succursales()->attach($request->succursaleProd);
    
            $produit->caracteristiques()->attach($request->caracteristiques);
            
            return new ProduitResource('produit ajouté avec succès !',$produit);
        });
    }
    /**
     * Display the specified resource.
     */
    public function show($produit)
    {
        $data=Produit::where('code',$produit)->first();
        if ($data) {
            return new ProduitResource('',$data);
        }
        else{
            return new ProduitResource('Ce succursale n\'existe pas !',[]);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produit $produit)
    {
        $produit->delete();
        return new ProduitResource('',$produit);
    }
}
