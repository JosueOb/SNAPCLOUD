@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Roles
                    @can('roles.create')
                        <a class="btn btn-primary btn-sm float-right" href="{{ route('roles.create') }}">
                            Crear
                        </a>
                    @endcan
                </div>

                <div class="card-body">
                   <table class="table">
                        <thead>
                            <tr>
                                <th width='10px'>ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $rol)
                                <tr>
                                    <td>{{$rol->id}}</td>
                                    <td>{{$rol->name}}</td>
                                    <td width='10px'>
                                        @can('roles.show')
                                            <a class="btn btn-sm btn-info" href="{{ route('roles.show', $rol->id) }}">Ver</a>
                                        @endcan
                                    </td>
                                    <td width='10px'>
                                        @can('roles.edit')
                                            <a class="btn btn-sm btn-secondary" href="{{ route('roles.edit', $rol->id) }}">Editar</a>
                                        @endcan
                                    </td>
                                    <td width='10px'>
                                        @can('roles.destroy')
                                            <form action="{{ route('roles.destroy', $rol->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                   </table>
                   {{$roles->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
