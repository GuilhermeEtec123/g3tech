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
                            <form method="POST" action="{{ route('new-project') }}">
                                @csrf
                                <input type="hidden" name="cliente_id" value="{{ $clienteId }}">
                                <input type="hidden" name="data_atual" value="<?php echo date('Y-m-d'); ?>">
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="titulo" class="form-control" placeholder="Nome do projeto" aria-label="Nome do projeto" value="{{ old('titulo') }}" >
                                    @error('titulo') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="number" name="qtdprestadores" class="form-control" placeholder="Quantidade de prestadores" aria-label="Quantidade de prestadores" value="{{ old('qtdprestadores') }}">
                                    @error('qtdprestadores') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div> 
                                <div class="flex flex-col mb-3">
                                    <input type="number" name="orcamento" class="form-control" placeholder="Valor do orçamento" aria-label="Valor do orçamento" value="{{ old('orcamento') }}" >
                                    @error('orcamento') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <!-- <div class="flex flex-col mb-3">
                                    <input type="text" name="categoria" class="form-control" placeholder="Estado do orçamento" aria-label="Categoria" value="{{ old('categoria') }}" >
                                    @error('categoria') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div> -->
                                <div class="flex flex-col mb-3">
                                    <input type="number" name="prazo" class="form-control" placeholder="Prazo para entrega" aria-label="Prazo para entrega" value="{{ old('prazo') }}" >
                                    @error('prazo') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <!-- <div class="flex flex-col mb-3" hidden>
                                    <input type="text" name="status" class="form-control" placeholder="Status do Projeto" aria-label="Status do Projeto" value="{{ old('status','Aberto') }}" >
                                    @error('status') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div> -->
                                <div class="flex flex-col mb-3">
                                    <textarea name="descricao" class="form-control" placeholder="Descrição do Projeto" aria-label="Descrição do Projeto" rows="8" maxlength="500">{{ old('descricao') }}</textarea>
                                    @error('descricao')
                                    <p class='text-danger text-xs pt-1'>{{ $message }}</p>
                                    @enderror
                                </div>
                            
                                <!-- <div class="flex flex-col mb-3">
                                    <select name="clientType" id="clientType" class="form-control" aria-label="clientType">
                                        <option value="0">Selecione</option>
                                        <option value="1">Demandante</option>
                                        <option value="2">Freelancer</option>
                                    </select>
                                    @error('clientType') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div> -->
                                <!-- fazer um if caso seja escolhido o freelancer -->
                                <!-- <div class="flex flex-col mb-3">
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
                                </div> -->
                                
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
