@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <h1>Permissões</h1>
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
                    <a href="{{ route('permissions.create') }}" class="btn btn-primary">Cadastrar</a>
                </div>
                <div class="col d-flex justify-content-end">
                    <form action="{{ route('permissions.search') }}" method="POST" class="form form-inline">
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
                                <th>Permissão</th>
                                <th>Descrição</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr class="text-center">
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->description }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('permissions.edit', $permission->id) }}"
                                                class="btn btn-warning">Editar</a>
                                            <form action="{{ route('permissions.destroy', $permission->id) }}"
                                                method="POST">
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
                {!! $permissions->appends($filters)->links() !!}

            @else
                {!! $permissions->links() !!}
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
