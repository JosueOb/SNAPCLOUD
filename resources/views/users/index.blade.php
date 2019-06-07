@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Usuarios
                </div>

                <div class="card-body">
                   <table class="table">
                        <thead>
                            <tr>
                                <th width='10px'>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td width='10px'>
                                        @can('users.show')
                                            <a class="btn btn-sm btn-info" href="{{ route('users.show', $user->id) }}">Ver</a>
                                        @endcan
                                    </td>
                                    <td width='10px'>
                                        @can('users.edit')
                                            <a class="btn btn-sm btn-secondary" href="{{ route('users.edit', $user->id) }}">Editar</a>
                                        @endcan
                                    </td>
                                    <td width='10px'>
                                        @can('users.destroy')
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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
                   {{$users->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
