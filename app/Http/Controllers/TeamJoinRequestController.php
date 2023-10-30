<?php

namespace App\Http\Controllers;
use App\Models\TeamJoinRequest;
use Illuminate\Http\Request;

class TeamJoinRequestController extends Controller
{
    
    public function index()
    {
        // Recupere todas as solicitações pendentes
        // $solicitacoesPendentes = TeamJoinRequest::where('status', 'pending')->get();

        // return view('solicitacoes.index', ['solicitacoesPendentes' => $solicitacoesPendentes]);
        return view('Team.solicitacao');
    }



    // public function aceitar($id)
    // {
    //     $solicitacao = TeamJoinRequest::find($id);
    //     if ($solicitacao) {
    //         $solicitacao->status = 'accepted';
    //         $solicitacao->save();
    //         // Implemente a lógica para associar o ClienteFreelancer à equipe correspondente

    //         return redirect()->route('solicitacoes.index')->with('success', 'Solicitação aceita com sucesso.');
    //     }
    //     return redirect()->route('solicitacoes.index')->with('error', 'Solicitação não encontrada.');
    // }

    // public function rejeitar($id)
    // {
    //     $solicitacao = TeamJoinRequest::find($id);
    //     if ($solicitacao) {
    //         $solicitacao->status = 'rejected';
    //         $solicitacao->save();

    //         return redirect()->route('solicitacoes.index')->with('success', 'Solicitação rejeitada com sucesso.');
    //     }
    //     return redirect()->route('solicitacoes.index')->with('error', 'Solicitação não encontrada.');
    // }


}
