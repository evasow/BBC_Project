<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $limit=3;
        return new UserCollection(User::paginate($limit));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user= User::firstOrCreate([
            'nomComplet' => $request->nomComplet,
            'login'=>$request->login,
            'password'=>$request->password,
            'succursale_id'=>$request->succursale_id
        ]);
        
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show($user)
    {
        $data=User::where('nomComplet',$user)->first();
        if ($data) {
            return new UserResource('',$data);
        }
        else{
            return new UserResource('Ce User n\'existe pas !');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->only('nomComplet','	login','password'));
        return new UserResource('User modifié avec succés !',$user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return new UserResource('User supprimé avec succés !',$user);
    }
}
