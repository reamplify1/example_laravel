<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        // validate
        $attributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'max: 254'],
            'password' => ['required', Password::min(6), 'confirmed'], //password_confirmation
            // 'password' => ['required', Password::min(5)->letters()->numbers()->max(100)],
        ]);
        // dd($attributes);
        // create a user
        $user = User::create($attributes);
        // dd($user);
        // log in
        Auth::login($user);

        // redirect
        return redirect('/jobs');
    }
}
