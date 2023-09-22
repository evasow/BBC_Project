<?php

namespace App\Http\Controllers;

use App\Models\Amis;
use App\Models\Succursale;
use Illuminate\Http\Request;

class AmiController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function listeSuccursalesFriends($id)
    {
        return Succursale::myFriends($id);
    }
    public function listeSuccursalesOthers($id)
    {
        return Succursale::others($id);
    }
    public function listeSuccursalesWait($id)
    {
        return Succursale::wait($id)->get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Amis $amis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Amis $amis)
    {
        //
    }
}
