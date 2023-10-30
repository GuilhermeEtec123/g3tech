<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;

class EquipeController extends Controller
{
    public function index()
    {
        $equipes = Equipe::all();
        return view('equipes.index', compact('equipes'));
    }

    public function create()
    {
        return view('equipes.create');
    }

    public function store(Request $request)
    {
        $equipe = new Equipe();
        $equipe->projeto_id = $request->input('projeto_id');
        $equipe->membro_id = $request->input('membro_id');
        $equipe->cargo_equipe = $request->input('cargo_equipe');
        // Adicione outros campos específicos de Equipe
        $equipe->save();

        return redirect()->route('equipes.index');
    }

    public function show(Equipe $equipe)
    {
        return view('equipes.show', compact('equipe'));
    }

    public function edit(Equipe $equipe)
    {
        return view('equipes.edit', compact('equipe'));
    }

    public function update(Request $request, Equipe $equipe)
    {
        $equipe->projeto_id = $request->input('projeto_id');
        $equipe->membro_id = $request->input('membro_id');
        $equipe->cargo_equipe = $request->input('cargo_equipe');
        // Atualize outros campos específicos de Equipe
        $equipe->save();

        return redirect()->route('equipes.index');
    }

    public function destroy(Equipe $equipe)
    {
        $equipe->delete();

        return redirect()->route('equipes.index');
    }
}
