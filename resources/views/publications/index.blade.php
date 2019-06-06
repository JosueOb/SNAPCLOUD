@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Publicaciones
                    @can('publications.create')
                        <a class="btn btn-primary btn-sm float-right" href="{{ route('publications.create') }}">
                            Crear
                        </a>
                    @endcan
                </div>

                <div class="card-body">
                   <table class="table">
                        <thead>
                            <tr>
                                <th width='10px'>ID</th>
                                <th>Título</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($publications as $publication)
                                <tr>
                                    <td>{{$publication->id}}</td>
                                    <td>{{$publication->title}}</td>
                                    <td>
                                        @can('publications.show')
                                            <a class="btn btn-sm btn-info" href="{{ route('publications.show', $publication->id) }}">Ver</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('publications.edit')
                                            <a class="btn btn-sm btn-secondary" href="{{ route('publications.edit', $publication->id) }}">Editar</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('publications.destroy')
                                            <form action="{{ route('publications.destroy', $publication->id) }}" method="POST">
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
                   {{$publications->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
