<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projeto as projetoModel;
use Illuminate\Support\Facades\Auth;


class ProjetoController extends Controller
{
    public function index()
    {
        $projetos = ProjetoModel::orderBy('created_at', 'desc')->get();
        return view('pages.Project.project-list',compact('projetos'));
    }

    public function create()
    {
        $clienteId = Auth::id();
        return view('pages.Project.new-project', compact('clienteId'));
    }

    public function store(Request $request)
    {
        $clienteId = Auth::id();
        $projeto = new ProjetoModel();
        $projeto->cliente_id = $clienteId;
        $projeto->titulo = $request->input('titulo');
        $projeto->descricao = $request->input('descricao');
        $projeto->orcamento = $request->input('orcamento');
        // $projeto->categoria = $request->input('categoria');
        $projeto->prazo = $request->input('prazo');
        // $projeto->status = $request->input('status');
        // $projeto->habilidades_necessarias = $request->input('habilidades_necessarias');
        $projeto->qtdprestadores = $request->input('qtdprestadores');
        // $projeto->cargos_equipe_desejados = $request->input('cargos_equipe_desejados');
        // Adicione outros campos específicos de Projeto
        // $users = UserModel::all()->sortBy("id");
        // dd($users);
        $projeto->save();

        return redirect()->route('list-project');
    }

    public function show($id)
    {
        
        $projeto = ProjetoModel::find($id);
        $projeto = ProjetoModel::with('cliente')->find($id);
        if ($projeto) {
            return view('pages.Project.project', ['projeto' => $projeto]);
        } else {
            return redirect()->route('project');
        }
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

        // return view('pages.Projects.project-list', ['projeto'=>$projeto]);

    }
}
