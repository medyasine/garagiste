<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function show()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {

        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'adress' => 'nullable|string|max:255',
            'numeroTelephone' => 'nullable|string|max:20',
        ]);

        $user = new User([
            'firstName' => $validatedData['firstName'],
            'lastName' => $validatedData['lastName'],
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
            'password' => bcrypt($validatedData['password']),
            'adress' => $validatedData['adress'],
            'numeroTelephone' => $validatedData['numeroTelephone'],
            'isClt' => true,
            'isMecan' => false,
            'isAdmin' => false,
        ]);

        $user->save();
        auth()->login($user);

        return redirect('login')->with('success', "Account successfully registered.now login");
    }
}
