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
                        <div class="form-group">
                            <label for="description">Email</label>
                            <input type="text" name="description" class="form-control" value="{{ $user->email}}">
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