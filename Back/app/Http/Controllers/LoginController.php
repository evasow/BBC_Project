<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'login' =>'required',
            'password'=>'required',
        ]);

        $user = User::where("login", $request->login)->first();
        
        if (!$user || !Hash::check($request->password, $user->password)) {
            return [
                'message' => 'Identifiant ou password Incorrecte'
            ];
        }
        $token = $user->createToken("api_token");
        
        return [
            'data' => [$token->plainTextToken,new UserResource($user)],
            'succes' => true,
            'message' => 'connecté'
        ];
       
    }
    public function logout(): Response
    {
        $user = Auth::user();
        
        $user->currentAccessToken()->delete();
        
        return Response(['data' => 'User Déconnecté avec succés !'],200);
    }
}
