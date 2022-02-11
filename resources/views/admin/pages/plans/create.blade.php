@extends('adminlte::page')

@section('title', 'Cadastrar Planos')

@section('content_header')
    <h1>Cadastro de Planos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-body">
                <form action="{{ route('plans.store') }}" method="POST">
                    @csrf
                    @include('admin.pages.plans._partials.form')
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
@stop

@section('js')

    <script>
        console.log('Hi!');
    </script>
@stop
