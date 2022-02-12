@extends('adminlte::page')

@section('title', 'Cadastrar Perfil')

@section('content_header')
    <h1>Cadastro de profis</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-body">
                <form action="{{ route('profiles.store') }}" method="POST">
                    @csrf
                    @include('admin.pages.profiles._partials.form')

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
