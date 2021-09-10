<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\LoginRequest;

class AuthController extends Controller
{


    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:8'
        ]);

        if (!Auth::attempt($attr)) {
            return response()->json([
                'message' => 'Credentials does not match'
            ], 401);
        }

        return response()->json([
            'message' => 'Login Successful.',
            'token' => Auth::user()->createToken('API Token')->plainTextToken,
        ]);
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();

        return [
            'message' => 'Logout Successful.'
        ];
    }

}
