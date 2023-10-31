@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Solicitações Pendentes'])

    <div class="container">
        <h1>Solicitações Pendentes</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Freelancer</th>
                    <th>Equipe</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- @foreach ($solicitacoesPendentes as $solicitacao) -->
                    <tr>
                        <!-- <td>{{ $solicitacao->freelancer->nome }}</td>
                        <td>{{ $solicitacao->team->nome }}</td>
                        <td>{{ $solicitacao->status }}</td>
                        <td>
                            <a href="{{ route('solicitacoes.aceitar', $solicitacao->id) }}">Aceitar</a>
                            <a href="{{ route('solicitacoes.rejeitar', $solicitacao->id) }}">Rejeitar</a>
                        </td> -->
                        <td>nome</td>
                        <td>equipe</td>
                        <td>status</td>
                        <td>
                            <a href="{{ route('solicitacoes.aceitar', $solicitacao->id) }}">Aceitar</a>
                            <a href="{{ route('solicitacoes.rejeitar', $solicitacao->id) }}">Rejeitar</a>
                        </td> 
                    </tr>
                <!-- @endforeach -->
            </tbody>
        </table>
    </div>


    <!-- <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Solicitações</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Nome</th>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Função</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Telefone</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">E-mail</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1 justify-content-center">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Guilherme</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 text-center">Front-end</p>
                                    </td>
                                    <td class="align-middle text-center text-sm text-center">
                                        <p class="text-sm font-weight-bold mb-0">(11)99425-9127</p>
                                    </td>
                                    <td class="align-middle text-center text-sm text-center">
                                        <p class="text-sm font-weight-bold mb-0">email@email.com</p>
                                    </td>
                                    <td class="align-middle text-center text-sm text-center">
                                        <p class="text-sm font-weight-bold mb-0">10/07/1998</p>
                                    </td>       
                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                            <p class="text-sm font-weight-bold mb-0">Edit</p>
                                            <p class="text-sm font-weight-bold mb-0 ps-2">Delete</p>
                                        </div>
                                    </td>
                                </tr> -->
                                <!-- <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div>
                                                <img src="./img/team-2.jpg" class="avatar me-3" alt="image">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Creator</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">Creator</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">22/03/2022</p>
                                    </td>
                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                            <p class="text-sm font-weight-bold mb-0">Edit</p>
                                            <p class="text-sm font-weight-bold mb-0 ps-2">Delete</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div>
                                                <img src="./img/team-3.jpg" class="avatar me-3" alt="image">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Member</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">Member</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">22/03/2022</p>
                                    </td>
                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                            <p class="text-sm font-weight-bold mb-0 cursor-pointer">Edit</p>
                                            <p class="text-sm font-weight-bold mb-0 ps-2 cursor-pointer">Delete</p>
                                        </div>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
