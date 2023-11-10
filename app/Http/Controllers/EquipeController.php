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
        $projetos = [];

        // Inicialize um array para armazenar os membros da equipe associados ao projeto
        $membros = [];

        // Recupere todas as equipes às quais o usuário pertence
        $equipes = Equipe::where('membro_id', $user->id)->get();

        // Itere sobre as equipes para encontrar o projeto associado
        foreach ($equipes as $equipe) {
            if ($equipe->projeto) {
                // Se a equipe estiver associada a um projeto, atribua o projeto à variável $projeto
                $projetos[] = $equipe->projeto;

                // Recupere os membros da equipe associados a esse projeto
                $equipesDoProjeto = Equipe::where('projeto_id', $equipe->projeto->id)->get();
                $membrosPorProjeto[$equipe->projeto->id] = [];
                foreach ($equipesDoProjeto as $equipeDoProjeto) {
                    $membro = User::find($equipeDoProjeto->membro_id);
                    $membrosPorProjeto[$equipe->projeto->id][] = $membro;
                }
            }
        }

        return view('pages.Team.team', compact('projetos', 'membrosPorProjeto'));
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

        return redirect()->route('team');
    }

    // EquipeController.php

    public function removeParticipante($membroId)
    {
        $equipe = Equipe::where('membro_id', $membroId)->first();

        if ($equipe) {
            $equipe->delete();
            return redirect()->route('team')->with('success', 'Participante removido da equipe com sucesso.');
        }

        return redirect()->route('team')->with('error', 'Erro ao remover participante da equipe.');
    }
}
