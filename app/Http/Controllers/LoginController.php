<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect(route('logout'))->with('success', 'Goodbye!');
    }

    public function create()
    {
        return view('login.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        if(! auth()->attempt($attributes))
        {
            throw ValidationException::withMessages([
                'email' => 'Invalid Credentials'
            ]);
        }

        session()->regenerate();

        return redirect(route('home'))->with('success', 'Welcome Back!');
    }

}
