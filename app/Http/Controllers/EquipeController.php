<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EquipeController extends Controller
{
    public function index()
    {
        // Recupere o usuário autenticado
        $user = Auth::user();
    
        // Inicialize uma variável para armazenar o projeto associado ao usuário
        $projeto = null;
    
        // Inicialize um array para armazenar os membros da equipe associados ao projeto
        $membros = [];
    
        // Recupere todas as equipes às quais o usuário pertence
        $equipes = Equipe::where('membro_id', $user->id)->get();
    
        // Itere sobre as equipes para encontrar o projeto associado
        foreach ($equipes as $equipe) {
            if ($equipe->projeto) {
                // Se a equipe estiver associada a um projeto, atribua o projeto à variável $projeto
                $projeto = $equipe->projeto;
    
                // Recupere os membros da equipe associados a esse projeto
                $equipesDoProjeto = Equipe::where('projeto_id', $projeto->id)->get();
                foreach ($equipesDoProjeto as $equipeDoProjeto) {
                    $membro = User::find($equipeDoProjeto->membro_id);
                    $membros[] = $membro;
                }
    
                // Saia do loop, pois já encontrou o projeto associado
                break;
            }
        }
    
        return view('pages.Team.team', compact('projeto', 'membros'));
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
