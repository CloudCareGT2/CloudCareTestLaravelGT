<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function checklogin(Request $request) {
        $response = $this->login($request);

        if ($response->status() == 200) {
            $tokenData = $response->getContent();
            $token = json_decode($tokenData)->token;

            session(['api_token' => $token]);
            return redirect()->route('punk-beers-listpage');
        } else {
            return back()->with('error', 'Credenziali non valide.');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'name' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('BeerAppToken')->plainTextToken;
            return response()->json(['token' => $token]);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}

