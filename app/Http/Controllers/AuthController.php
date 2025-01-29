<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function register()
    {
        return view('users.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid_user = $request->validate([
            'name' => 'required|string|max:60',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|string|min:6'
        ]);

        User::create([
            'name' => $valid_user['name'],
            'email' => $valid_user['email'],
            'password' => bcrypt($valid_user['password'])
        ]);
        return redirect()->route('auth.login')->with(['success' => 'Votre compte a été créé avec succès']);
    }

    public function login(Request $request)
    {
        return view('users.login');
    }

    public function verifyLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            session([
                'user_id' => $user->id,
                'user_name' => $user->name,
                'authentication' => true,
            ]);

            return redirect()->route('home')->with(['logged' => 'connexion avec succès']);
        } else {
            session([
                'authentication' => false
            ]);
            return redirect()->route('auth.login')->with([
                'error_login' => 'email ou mot de passe incorrect.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['user_id', 'user_name', 'authentication']);
        $request->session()->invalidate();
        Auth::logout();
        return redirect()->route('auth.login')->with('logout_message', 'Vous êtes déconnecté avec succès.');
    }
}
