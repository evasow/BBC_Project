<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\UserRequest;
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
            throw ValidationException::withMessages([
                "message" => "Identifiant ou mot de passe incorrect"
            ]);
        }
        $token = $user->createToken("api_token");
        
        return [
            'token' => $token->plainTextToken,
            'user' => $user,
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
