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
                                <input type="text" name="username" class="form-control1" placeholder="Nome de Usuario" aria-label="Name" value="{{ old('username') }}" >
                                    @error('username') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" value="{{ old('email') }}" >
                                    @error('email') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Senha" aria-label="Password">
                                    @error('password') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="firstname" class="form-control" placeholder="Nome" aria-label="Name" value="{{ old('firstname') }}" >
                                    @error('firstname') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="lastname" class="form-control" placeholder="Sobrenome" aria-label="Name" value="{{ old('lastname') }}" >
                                    @error('lastname') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="address" class="form-control" placeholder="Endereço" aria-label="Name" value="{{ old('address') }}" >
                                    @error('address') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="city" class="form-control" placeholder="Cidade" aria-label="Name" value="{{ old('city') }}" >
                                    @error('city') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="country" class="form-control" placeholder="País" aria-label="Name" value="{{ old('country') }}" >
                                    @error('country') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="number" name="postal" class="form-control" placeholder="CEP" aria-label="Name" value="{{ old('postal') }}" >
                                    @error('postal') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
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
