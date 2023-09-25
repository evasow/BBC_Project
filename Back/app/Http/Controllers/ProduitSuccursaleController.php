<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProduitSuccursaleCollection;
use App\Models\ProduitSuccursale;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProduitSuccursaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        
        return new ProduitSuccursaleCollection(
            ProduitSuccursale::with('produit')
            ->where('succursale_id',$id)->paginate(2));
            
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(produitSuccursale $produitSuccursale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, produitSuccursale $produitSuccursale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produitSuccursale $produitSuccursale)
    {
        //
    }
}
