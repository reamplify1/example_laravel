<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store()
    {
        //validate
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        //attempt to login the user
        if(!Auth::attempt($attributes)){
            throw ValidationValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match',
                
            ]);
        };

        //regenerate the session token
        request()->session()->regenerate();

        //redirect
        return redirect('/jobs');
    }
    public function destroy(){
        Auth::logout();

        return redirect('/');
    }
}
