<?php

namespace App\Http\Controllers;

use App\Models\TeamJoinRequest as TeamJoinRequestModel;
use App\Models\Equipe as EquipeModel;
use App\Models\User as UserModel;
use App\Models\Projeto as ProjetoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamJoinRequestController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if ($user->clientType === 1) {
            // Se for um demandante, mostra todas as solicitações pendentes
            $solicitacoesPendentes = TeamJoinRequestModel::where('status', 'pendente')
                ->with(['freelancer', 'equipe.projeto']) // Carregue os dados do freelancer e do projeto associado à equipe
                ->get();
        } else {
            // Se for um freelancer, mostra apenas as solicitações que ele enviou
            $solicitacoesPendentes = TeamJoinRequestModel::where('freelancer_id', $user->id)
                ->with(['freelancer', 'equipe', 'equipe.projeto']) // Carregue os dados do freelancer e do projeto associado à equipe
                ->get();
        }
    
        return view('pages.Team.solicitacao', ['solicitacoesPendentes' => $solicitacoesPendentes]);
    }
    
    public function show()
    {
        $solicitacoesPendentes = TeamJoinRequestModel::orderBy('created_at', 'desc')->get();
        return view('pages.Team.solicitacao-list', compact('solicitacoesPendentes'));
    }

    public function create()
    {
        // Crie a view para enviar solicitações de participação
        return view('team_join_requests.create');
    }

    public function store($projetoId)
    {

        $equipe = EquipeModel::where('projeto_id', $projetoId)->first();
        // $projeto = ProjetoModel::find($projetoId);

        if ($equipe) {
            $equipeId = $equipe->id;
            $teamJoinRequest = new TeamJoinRequestModel([
                'freelancer_id' => Auth::id(),
                'team_id' => $equipeId,
                'status' => 'pendente'
            ]);

            $teamJoinRequest->save();

            return back()->with('success', 'Solicitação enviada com sucesso.');

            // return redirect()->route('solicitacoes');
            // return view('pages.Team.solicitacao');
        } else {
            return back()->with('success', 'Solicitação enviada com erro.');
        }

        return back()->with('success', 'Solicitação enviada com sucesso.');
    }


    public function aceitar($id)
    {
        $solicitacao = TeamJoinRequestModel::find($id);
        if ($solicitacao) {
            $solicitacao->status = 'aceito';
            $solicitacao->save();

            // Obtenha o ID da equipe da solicitação
            $teamId = $solicitacao->team_id;

            // Obtenha o ID do freelancer da solicitação
            $freelancerId = $solicitacao->freelancer_id;

            // Crie um novo registro na tabela de equipes para associar o freelancer à equipe
            $equipe = new EquipeModel();
            $equipe->projeto_id = $teamId; // Defina o ID do projeto, se aplicável
            $equipe->membro_id = $freelancerId;
            // $equipe->cargo_equipe = 'Membro'; // Defina o cargo conforme necessário
            $equipe->save();
            // Implemente a lógica para associar o ClienteFreelancer à equipe correspondente

            return redirect()->route('solicitacoes')->with('success', 'Solicitação aceita com sucesso.');
        }
        return redirect()->route('solicitacoes')->with('error', 'Solicitação não encontrada.');
    }

    public function rejeitar($id)
    {
        $solicitacao = TeamJoinRequestModel::find($id);
        if ($solicitacao) {
            $solicitacao->status = 'rejeitado';
            $solicitacao->save();

            return redirect()->route('solicitacoes')->with('success', 'Solicitação rejeitada com sucesso.');
        }
        return redirect()->route('solicitacoes')->with('error', 'Solicitação não encontrada.');
    }

  
}
