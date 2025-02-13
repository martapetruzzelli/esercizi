<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login (Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!auth()->attempt($credentials)){
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $user = auth()->user();

        $token = $user->createToken('access_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'access_token' => $token
        ]);

    }

}
