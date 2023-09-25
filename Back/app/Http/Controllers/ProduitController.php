<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Succursale;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProduitRequest;
use App\Http\Resources\ProduitCollection;
use App\Http\Resources\ProduitResource;
use App\Models\ProduitSuccursale;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
    public function show($code)
    {
        $data=Produit::where('code',$code)->first();
        if ($data) {
            return new ProduitResource('',$data);
        }
        else{
            return new ProduitResource('Ce succursale n\'existe pas !',[]);
        }
    }
    public function searchProduct($code, $succ){
        $produit = Produit::where("code", $code)->first();
        if (!$produit) {
            return new ProduitResource("code introuvable !",[]);
        }
        $hisProduit = ProduitSuccursale::where(
            ['succursale_id' => $succ, "produit_id" => $produit->id])
              ->where('quantite_stock', '>', 0)->first();
              
        if (!$hisProduit) {
            $ids = Succursale::myFriends($succ)->pluck("to_succ");

            $produit = Produit::with(['succursales' => function ($q) use ($ids) {
                $q->whereIn('succursale_id', $ids)
                ->where('quantite_stock', ">", 0)->orderBy('prix_gros', "asc");

            }, 'caracteristiques'])->where('code', $code)->first();

                return new ProduitResource('',$produit);
            // $produit = Produit::quantitePositive($ids, $code)->first();
        }
        $produit = Produit::with(['succursales' => function ($q) use ($succ) {
            $q->where('succursale_id', $succ);
        }, 'caracteristiques'])->where('code', $code)->first();
        return new ProduitResource('',$produit) ;
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
