@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card ">
                <!-- <div class=" pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-2">Sales by Country</h6>
                    </div>
                </div> -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('new-project') }}">
                            <span class="nav-link-text ms-1">Novo Projeto</span>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            @foreach ($projetos as $projeto)

                <div class="card mb-4">
                    <a href="{{ route('project', ['id' => $projeto->id]) }}">

                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">{{$projeto->titulo}}</h6>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center ">
                            <tbody>
                                <tr>
                                    <td     >
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Prazo:</p>
                                                <h6 class="text-sm mb-0">{{$projeto->prazo}} Dias</h6>

                                            </div>
                                        </div>
                                    </td>
                                    <td     >
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Categoria:</p>
                                                <h6 class="text-sm mb-0">Desenvolvimento Web</h6>

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Data de Criação</p>
                                                <h6 class="text-sm mb-0">{{$projeto->created_at->format('d/m/Y')}}</h6>

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1 align-items-center">

                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Status: </p>
                                                <h6 class="text-sm mb-0">{{$projeto->status}}aberto</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Orçamento:</p>
                                                <h6 class="text-sm mb-0">R${{$projeto->orcamento}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col text-center fs-5 d-flex flex-column">
                                        <div class="d-flex px-2 py-1 align-items-center flex-column">
                                            <p class="text-xs font-weight-bold mb-0">Equipe: </p>
                                            <div class="d-flex flex-row">
                                                <i class="fas fa-users"></i>
                                                <h6 class="text-sm mb-0 ms-2 text-cente ">{{$projeto->qtdPrestadores}}</h6>
                                            </div>
                                            

                                        </div>

                                    </td>


                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>


    @include('layouts.footers.auth.footer')
</div>
@endsection

@push('js')
<script src="./assets/js/plugins/chartjs.min.js"></script>
<script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
    new Chart(ctx1, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Mobile apps",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#fb6340",
                backgroundColor: gradientStroke1,
                borderWidth: 3,
                fill: true,
                data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#fbfbfb',
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#ccc',
                        padding: 20,
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
</script>
@endpush