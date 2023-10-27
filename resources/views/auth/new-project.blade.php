@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Criar Projeto'])
    <main class="main-content  mt-0">
        <!-- <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span> -->
            <!-- <div class="container mt-10">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Crie seu projeto</h1>
                        <p class="text-lead text-white">Crie seu projeto.</p>
                    </div>
                </div>
            </div> -->
        <!-- </div> -->
        <div class="container mt-10">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <h5>Crie seu projeto</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register.perform') }}">
                                @csrf
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="nomeProjeto" class="form-control" placeholder="Nome do projeto" aria-label="Nome do projeto" value="{{ old('nomeProjeto') }}" >
                                    @error('nomeProjeto') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="number" name="qtdprestadoresProjeto" class="form-control" placeholder="Quantidade de prestadores" aria-label="Quantidade de prestadores" value="{{ old('qtdprestadoresProjeto') }}">
                                    @error('qtdprestadoresProjeto') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="number" name="valorOrcamento" class="form-control" placeholder="Valor do orçamento" aria-label="Valor do orçamento" value="{{ old('valorOrcamento') }}" >
                                    @error('valorOrcamento') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="estadoOrcamento" class="form-control" placeholder="Estado do orçamento" aria-label="Estado do orçamento" value="{{ old('estadoOrcamento') }}" >
                                    @error('estadoOrcamento') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="date" name="dataentregaProjeto" class="form-control" placeholder="Data para a entrega do projeto" aria-label="Data para a entrega do projeto" value="{{ old('dataentregaProjeto') }}" >
                                    @error('dataentregaProjeto') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="statusEquipe" class="form-control" placeholder="Status da Equipe" aria-label="Status da Equipe" value="{{ old('statusEquipe') }}" >
                                    @error('statusEquipe') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <textarea name="descricaoEquipe" class="form-control" placeholder="Descrição da equipe" aria-label="Descrição da equipe" rows="8" maxlength="500">{{ old('descricaoEquipe') }}</textarea>
                                    @error('descricaoEquipe')
                                    <p class='text-danger text-xs pt-1'>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <textarea name="descricaoProjeto" class="form-control" placeholder="Descrição do projeto" aria-label="Descrição do projeto" rows="8" maxlength="500">{{ old('descricaoProjeto') }}</textarea>
                                    @error('descricaoProjeto')
                                    <p class='text-danger text-xs pt-1'>{{ $message }}</p>
                                     @enderror
                                </div>
                            
                                <div class="flex flex-col mb-3">
                                    <select name="clientType" id="clientType" class="form-control" aria-label="clientType">
                                        <option value="0">Selecione</option>
                                        <option value="1">Demandante</option>
                                        <option value="2">Freelancer</option>
                                    </select>
                                    @error('clientType') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <!-- fazer um if caso seja escolhido o freelancer -->
                                <div class="flex flex-col mb-3">
                                    <select name="freelancerType" id="freelancerType" class="form-control" aria-label="freelancerType">
                                        <option value="0">Selecione</option>
                                        <option value="1">Desenvolvedor Full-Stack</option>
                                        <option value="2">Desenvolvedor Front-End</option>
                                        <option value="3">Desenvolvedor Back-End</option>
                                        <option value="4">Design</option>
                                        <option value="5">Product owner</option>
                                        <option value="6">Data Science</option>
                                        <option value="7">Quality Assurance </option>
                                        <option value="8">Tech Lead</option>

                                    </select>
                                    @error('freelancerType') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Cadastrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('layouts.footers.guest.footer')
@endsection
