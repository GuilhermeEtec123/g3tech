<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => ['required','max:255', 'min:2'],
            'firstname' => ['max:100'],
            'lastname' => ['max:100'],
            'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(auth()->user()->id),],
            'address' => ['max:100'],
            'city' => ['max:100'],
            'country' => ['max:100'],
            'postal' => ['max:100'],
            'about' => ['max:255'],
            'clientType' => ['max:1'],
            'terms' => 'required'
        ]);
        $user = User::create($attributes);
        auth()->login($user);

        return redirect('/dashboard');
    }
}
