@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Equipe'])
    <div class="row mt-10 mx-4">
        <div class="col-12">
            @if(count($projetos) > 0)
                @foreach ($projetos as $index => $projeto)
                    <div class="card mb-4">
                        <div class="card-header pb-0 d-flex justify-content-between">
                            <h6>{{ $projeto->titulo }}</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Nome</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Função</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Telefone</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Email</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Data de criação</th>
                                            @if (Auth::user()->clientType == 1)
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    @foreach ($membrosPorProjeto[$projeto->id] as $membro)
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-1 py-1 justify-content-center">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $membro->firstname }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 text-center">{{ $membro->freelancerType }}</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-sm font-weight-bold mb-0">(11)99425-9127</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-sm font-weight-bold mb-0">{{ $membro->email }}</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-sm font-weight-bold mb-0">{{ $membro->created_at->format('d/m/Y') }}</p>
                                                </td>
                                                @if(Auth::user()->clientType == 1 || Auth::user()->freelancerType == 'Product owner')
                                                    <td class="align-middle text-end">
                                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                            <form action="{{ route('team-join-requests.store', ['projetoId' => $projeto->id]) }}" method="post" class="me-2">
                                                                @csrf
                                                                @method('post')
                                                                <input type="hidden" name="freelancer_id" value="{{ Auth::id() }}">
                                                                <button type="submit" class="btn btn-primary">Editar</button>
                                                            </form>
                                                            <form action="{{ route('equipes.remove-participante', ['membroId' => $membro->id]) }}" method="post">
                                                                @csrf
                                                                @method('post')
                                                                <button type="submit" class="btn" onclick="return confirm('Deseja remover este participante?')">Remover</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>O usuário não está associado a nenhum projeto.</p>
            @endif
        </div>
    </div>
@endsection
