<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // Pakai bcrypt
        // $validatedData['password'] = bcrypt($validatedData['password']);

        // Pakai Hashing
        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::create($validatedData);

        // $request->session()->flash('success', 'Resgistration successful! Please login');
        // $request->session()->$request->flash();

        return redirect('/login')->with('success', 'Resgistration successful! Please login');
    }
}
