<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    
    public function show(){
        return view('auth.register');
    }

    public function register(RegisterRequest $request){

        // Validate the form data
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'adress' => 'nullable|string|max:255',
            'numeroTelephone' => 'nullable|string|max:20',
            'agree' => 'accepted',
        ]);
        $user = new User();
        $user->firstName = $validatedData['firstName'];
        $user->lastName = $validatedData['lastName'];
        $user->email = $validatedData['email'];
        $user->username = $validatedData['username'];
        $user->password = bcrypt($validatedData['password']);
        $user->adress = $validatedData['adress'];
        $user->numeroTelephone = $validatedData['numeroTelephone'];
        $user->save();
        auth()->login($user);
        redirect('/')->with('success', "Account successfully registered.");
    }
}
