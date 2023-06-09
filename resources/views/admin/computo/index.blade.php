@extends('adminlte::page')

@section('title', 'Computos')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}"> <i class="fas fa-home"></i> Panel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Computos</li>
        </ol>
    </nav>
@stop

@section('right-sidebar')
    @include('admin.right_sidebar')
@stop

@section('content')
    <section id="app">
        <table-computos></table-computos>
    </section>
@stop

@section('css')
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
@stop

@section('js')
    <script src="{{ mix('/js/app.js') }}"></script>
@stop
