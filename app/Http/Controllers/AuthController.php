<?php

namespace App\Http\Controllers;

use App\Mail\Auth\ResetPasswordLinkMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

    // forgetPassword
    public function forgetPassword()
    {
        return view('auth.forget-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = $request->email;
        $resetPasswordLink = url("reset-password/" . $token);

        Mail::to($request->email)->send(new ResetPasswordLinkMail($resetPasswordLink));
        
        return redirect()->back()->with('success', 'Password reset link sent to your email.');
    }

    public function resetPasswordPage($token)
    {
        $user = User::where('email', $token)->first();
        if($user){
            return view('auth.reset-password', compact('token'));
        }else{
            return to_route('password.request')->withErrors(['token' => 'Token Mismatch']);
        }
        
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();

        if($user){
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('login')->with('success', 'Password changed successfully.');
        }
        
        return redirect()->back()->withErrors('email', 'Email mismatch.');
        
    }
}
