@extends('adminlte::page')
@section('css')
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
@stop

@section('title', 'Dashboard Admin')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item active" aria-current="page">
                <i class="fas fa-home"></i> Panel

            </li>
        </ol>
    </nav>
@stop

@section('right-sidebar')
    @include('admin.right_sidebar')
@stop

@section('content')
    <section id="app" class="">
        <div class="container">

            @can('ver botones panel')
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <a href="/home">
                                    <h1 class="font-light text-white">
                                        <i class="fas fa-home"></i>
                                    </h1>
                                    <h6 class="text-white">Dashboard</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-olive text-center">
                                <a href="{{ route('files.index') }}">
                                    <h1 class="font-light text-white">
                                        <i class="fas fa-file-csv"></i>
                                    </h1>
                                    <h6 class="text-white">Excel / CSV</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-orange text-center">
                                <a href="{{ route('ddjj.index') }}">
                                    <h1 class="font-light text-white">
                                        <i class="fas fa-book"></i>
                                    </h1>
                                    <h6 class="text-white">Declaraciones Juradas</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <a href="{{route('users.index')}}">
                                    <h1 class="font-light text-white">
                                        <i class="fas fa-users"></i>
                                    </h1>
                                    <h6 class="text-white">Usuarios</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <a href="/computos">
                                    <h1 class="font-light text-white">
                                        <i class="fas fa-calculator"></i>
                                    </h1>
                                    <h6 class="text-white">Computos</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <a href="{{route('liquidaciones.index')}}">
                                    <h1 class="font-light text-white">
                                        <i class="fas fa-file-invoice-dollar"></i>
                                    </h1>
                                    <h6 class="text-white">Liquidaciones</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <a href="/hlaborales">
                                    <h1 class="font-light text-white">
                                        <i class="fas fa-stream"></i>
                                    </h1>
                                    <h6 class="text-white">Historias Laborales</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <a href="/conceptos">
                                    <h1 class="font-light text-white">
                                        <i class="fas fa-cogs"></i>
                                    </h1>
                                    <h6 class="text-white">Configuraciones</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-olive text-center">
                                <h1 class="font-light text-white">
                                    <i class="fas fa-building"></i>
                                </h1>
                                <h6 class="text-white">Departamentos</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-orange text-center">
                                <a href="{{ route('codigos.index') }}">
                                    <h1 class="font-light text-white">
                                        <i class="fas fa-list"></i>
                                    </h1>
                                    <h6 class="text-white">Codigos</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
            @endcan

            {{-- <home-component></home-component> --}}
        </div>
    </section>
@stop



@section('js')
    <script src="{{ mix('/js/app.js') }}"></script>
@stop
