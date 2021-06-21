<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register()
    {
        return view("auth.register");
    }
    public function handleRegister()
    {
        $validatedRequest = request()->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ]);
        $user = new User($validatedRequest);
        $user->password = Hash::make($user->password);
        $user->save();
        return redirect('/admin/login')->with("success", "You are Registered");
    }
    public function login()
    {
        return view("auth.login");
    }
    public function handleLogin()
    {

        $validatedRequest = request()->validate([
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        $userDoesNotExist = User::where('email', $validatedRequest['email'])->count() == 0;
        if ($userDoesNotExist) {
            return redirect()->back()->with("error", "wrong email / password");
        }

        $user = User::where('email', $validatedRequest['email'])->first();

        $passwordVerified = Hash::check($validatedRequest['password'], $user->password);

        if (!$passwordVerified) {
            return redirect()->back()->with("error", "wrong email / password");
        }
        Auth::login($user);
        return redirect('/dashboard');
    }
}
