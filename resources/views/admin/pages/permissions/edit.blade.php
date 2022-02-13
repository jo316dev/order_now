@extends('adminlte::page')

@section('title', "Editar {{ $permission->name }}")

@section('content_header')
    <h1>Editar: {{ $permission->name }}</h1>
@stop

@section('content')

    <div class="card">
        @include('admin.includes.alerts')

        <div class="card-body">

            <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.pages.permissions._partials.form')
            </form>

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
