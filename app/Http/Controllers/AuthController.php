<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function regitrationPage()
    {
        return view('auth.register');
    }

    // register user
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    // login
    public function login()
    {
        return view('auth.login');
    }

    // authenticate
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->route('dashboard')->with('success', 'Login successful.');
        }

        return redirect()->route('login')->withErrors(['email' => 'Invalid credentials. Please try again.']);
    }

    // dashboard
    public function dashboard()
    {
        return view('profile.dashboard');
    }

    // logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}
