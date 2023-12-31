<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
class UserProfileController extends Controller
{
    public function show()
    {
        return view('pages.user-profile');
    }


    public function update(Request $request)
    {
        $attributes = $request->validate([
            'username' => ['required', 'max:255', 'min:2'],
            'firstname' => ['max:100'],
            'lastname' => ['max:100'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore(auth()->user()->id),
            ],
            'address' => ['max:100'],
            'city' => ['max:100'],
            'country' => ['max:100'],
            'postal' => ['max:100'],
            'about' => ['max:255'],
            'clientType' => ['max:255'],
            'freelancerType' => ['max:255'],
        ]);

        // Obtenha o usuário atualmente autenticado
        $user = auth()->user();

        // Realize uma consulta direta para atualizar os atributos no banco de dados
        DB::table('users')->where('id', $user->id)->update($attributes);

        return back()->with('success', 'Profile successfully updated');
    }


}
