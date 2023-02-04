<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'loginPage', 'register', 'registerPage', 'logout']]);
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function registerPage()
    {
        return view('auth.register');
    }

    public function login(Request $r)
    {
        $r->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $token = Auth::attempt($r->only('email', 'password'));

        if(!$token) {
            return back()->withErrors(['error' => 'Логин или пароль не совпадают']);
        }

        session(['token' => $token]);

        return to_route('home');
    }

    public function register(Request $r){
        $r->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $r->name,
            'email' => $r->email,
            'password' => Hash::make($r->password),
        ]);

        $token = Auth::login($user);

        session(['token' => $token]);

        return to_route('home');
    }

    public function logout()
    {
        session()->forget('token');

        return to_route('login');
    }
}
