<?php

namespace App\Http\Controllers;

use App\Http\Resources\CaracteristiquesResource;
use App\Models\Caracteristiques;
use Illuminate\Http\Request;

class CaracteristiquesController extends Controller
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
    public function store(Request $request)
    {
        $validate=$request->validate([
            'libelle' =>'required|string|unique:caracteristiques',
        ]);
        return new CaracteristiquesResource('',Caracteristiques::firstOrCreate($validate));
    }

    /**
     * Display the specified resource.
     */
    public function show(Caracteristiques $caracteristiques)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Caracteristiques $caracteristiques)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Caracteristiques $caracteristiques)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Caracteristiques $caracteristiques)
    {
        //
    }
}
