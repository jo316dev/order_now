@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    @include('admin.includes.alerts')
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-between">
                    <a href="{{ route('plans.create') }}" class="btn btn-primary">Cadastrar</a>
                </div>
                <div class="col d-flex justify-content-end">
                    <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
                        @csrf
                        <input type="text" name="filter" placeholder="Nome" class="form-control"
                            value="{{ $filters['filter'] ?? '' }}">
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>Plano</th>
                                <th>Descrição</th>
                                <th>Valor</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plans as $plan)
                                <tr class="text-center">
                                    <td>{{ $plan->name }}</td>
                                    <td>{{ $plan->description }}</td>
                                    <td>{{ $plan->price }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('plans.edit', $plan->url) }}"
                                                class="btn btn-warning">Editar</a>
                                            <form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-center">
            @if (isset($filters))
                {!! $plans->appends($filters)->links() !!}

            @else
                {!! $plans->links() !!}
            @endif
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
