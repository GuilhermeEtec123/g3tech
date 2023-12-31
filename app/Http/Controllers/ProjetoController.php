<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projeto as projetoModel;
use Illuminate\Support\Facades\Auth;
use App\Models\Equipe as EquipeModel;
use App\Models\User;


class ProjetoController extends Controller
{
    public function index()
    {
        $user = auth()->user();
    
        if ($user->clientType === 1) {
            $projetos = ProjetoModel::where('cliente_id', $user->id)->orderBy('created_at', 'desc')->get();
        } else {
            $projetos = ProjetoModel::orderBy('created_at', 'desc')->get();
        }
    
        return view('pages.Project.project-list', compact('projetos'));
    }

    public function create()
    {
        $clienteId = Auth::id();
        return view('pages.Project.new-project', compact('clienteId'));
    }

    public function store(Request $request)
    {
        $request->validate(ProjetoModel::$rules);
        $clienteId = Auth::id();
        $projeto = new ProjetoModel();
        $projeto->cliente_id = $clienteId;
        $projeto->titulo = $request->input('titulo');
        $projeto->descricao = $request->input('descricao');
        $projeto->orcamento = $request->input('orcamento');
        $projeto->prazo = $request->input('prazo');
        $projeto->qtdprestadores = $request->input('qtdprestadores');
        // $projeto->categoria = $request->input('categoria');
        // $projeto->status = $request->input('status');
        // $projeto->habilidades_necessarias = $request->input('habilidades_necessarias');
        // $projeto->cargos_equipe_desejados = $request->input('cargos_equipe_desejados');
        // Adicione outros campos específicos de Projeto
        // Adicione outros campos específicos de Projeto
        $projeto->save();
        
        $equipe = new EquipeModel();
        $equipe->projeto_id = $projeto->id; // Use o ID do projeto recém-criado
        $equipe->membro_id = $clienteId;; // ID do criador do projeto
        $equipe->save();

        return redirect()->route('list-project')->with('success', 'Projeto criado com sucesso.');;
    }

    public function show($id)
    {
        // $projeto = ProjetoModel::find($id);
        $projeto = ProjetoModel::with('cliente')->find($id);
        if ($projeto) {
            return view('pages.Project.project_2', ['projeto' => $projeto]);
        } 

        return redirect()->route('project');
    }

    public function edit(ProjetoModel $projeto)
    {
        return view('pages.Project.edit', compact('projeto'));
    }

    public function update(Request $request, ProjetoModel $projeto)
    {
        // $projeto->cliente_id = $request->input('cliente_id');
        $projeto->titulo = $request->input('titulo');
        $projeto->descricao = $request->input('descricao');
        $projeto->orcamento = $request->input('orcamento');
        // $projeto->categoria = $request->input('categoria');
        // $projeto->data_criacao = $request->input('data_criacao');
        // $projeto->status = $request->input('status');
        // $projeto->habilidades_necessarias = $request->input('habilidades_necessarias');
        // $projeto->numero_membros_equipe_desejado = $request->input('numero_membros_equipe_desejado');
        // $projeto->cargos_equipe_desejados = $request->input('cargos_equipe_desejados');
        // Atualize outros campos específicos de Projeto
        $projeto->save();

        return redirect()->route('list-project');
    }

    public function destroy($id)
    {
        $projeto=ProjetoModel::find($id);

        $projeto->delete();

        return redirect()->route('list-project');


    }
}
