@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rol</div>

                <div class="card-body">
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <hr>
                        <h3>Permiso especial</h3>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name='special' value="all-access" id="access">
                            <label class="form-check-label" for="access">
                                Acceso total
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name='special' value="no-access" id="no-access">
                            <label class="form-check-label" for="no-access">
                                Ningún acceso
                            </label>
                        </div>

                        <h3>Lista de Permisos</h3>
                        <div class="form-group">
                            <ul class="list-unstyled">
                                @foreach ($permissions as $permission)
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name='permissions[]' value="{{ $permission->id}}" id="{{$permission->name}}">
                                            <label class="form-check-label" for="{{$permission->name}}">
                                                {{ $permission->name}}
                                                <em>({{ $permission->description ?: 'Sin descripción'}})</em>
                                            </label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection