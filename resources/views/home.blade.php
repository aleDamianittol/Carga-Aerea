@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <h4>Acciones</h4>
    <div class="row mt-4">
        <div class="col-md-4 mb-3">
            <a href="{{ route('roles.index') }}" class="btn btn-primary w-100 py-3">
                Gestión de Roles
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('usuarios.index') }}" class="btn btn-primary w-100 py-3">
                Gestión de Usuarios
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('aduanas.gestion') }}" class="btn btn-outline-success w-100 py-3">
                Gestión de Aduanas
            </a>
        </div>
    </div>
@endsection
