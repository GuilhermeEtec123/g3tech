@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Solicitações Pendentes'])

<div class="row mt-4 mx-4">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Freelancer</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Equipe</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Status</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Ações</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Create Date</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action</th>
                            </tr>
                        </thead>
                        @foreach ($solicitacoesPendentes as $solicitacao)
                        <tbody class="text-center">
                            <td>{{ $solicitacao->freelancer->firstname }}</td>
                            <td>{{ $solicitacao->team_id }}</td>
                            <td>{{ $solicitacao->status }}</td>
                            <td></td>
                            <td></td>
                            <td class="d-flex justify-content-center">
                                <form action="{{ route('solicitacoes.rejeitar', $solicitacao->id) }}" method="post" class="me-3">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn">Recusar</button>
                                </form>
                                <form action="{{ route('solicitacoes.aceitar', $solicitacao->id) }}" method="post">
                                    @csrf
                                    @method('post')
                                    <button type="submit" class="btn btn-primary">Aceitar</button>
                                </form>
                            </td>

                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection