<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function store()
    {
        $validated = request()->validate([
            'first_name' => 'required|min:2|max:50',
            'last_name' => 'required|min:2|max:50',
            'address' => 'required|min:1|max:255',
            'contact' => 'required|min:11|max:11',
            'age' => 'required|integer|min:1|max:120',
            'email' => 'required|email|unique:users,email',
            'password' => 'confirmed|required|min:8',
        ]);

        if ($validated['age'] > 5 && $validated['age'] < 70) {
            User::create([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'address' => $validated['address'],
                'contact' => $validated['contact'],
                'age' => $validated['age'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);
            return redirect()->route('login');
        } else {
            return redirect()->route('register')->with('age', 'Underage, a student enrollee must be 5 years old and above.');
        }
    }

    public function login()
    {
        return view('login');
    }

    public function authenticate()
    {
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (auth()->attempt($validated)) {
            request()->session()->regenerate(); // Remove any sessions
            return redirect()->route('auth.dashboard');
        }

        return redirect()
            ->route('login')
            ->withErrors([
                'email' => 'Email or password is incorrect',
            ]);
    }

    public function logout()
    {
        Auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}

