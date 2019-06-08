@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuario</div>

                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="title">Nombre</label>
                            <input type="text" name="title" class="form-control" value="{{ $user->name}}">
                        </div>
                        <hr>
                        <h3>Lista de roles</h3>
                        <div class="form-group">
                            <ul class="list-unstyled">
                                @foreach ($roles as $role)
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name='roles[]' value="{{ $role->id}}" id="{{$role->name}}"
                                            @if ($user->roles->contains($role->id)) checked @endif>
                                            <label class="form-check-label" for="{{$role->name}}">
                                                {{ $role->name}}
                                                <em>({{ $role->description ?: 'Sin descripción'}})</em>
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