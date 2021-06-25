<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LogInController extends Controller
{
    /**
     * Handle the incoming request.
     *
     */
    public function create()
    {
        return view('login.create');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
           'email' => 'required|email',
           'password' => 'required'
        ]);

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages(['email' => 'Your credentials are invalid.']);
        }

        session()->regenerate(); # session fixation
        return redirect('/')->with('success', 'Now you are logged in.');
    }
}
