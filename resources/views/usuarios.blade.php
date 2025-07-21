@extends('layouts.admin')

@section('title', 'Gestión de Usuarios')

@section('content')
  <h2 class="mb-4">Usuarios</h2>

  {{-- Sección Nuevo Usuario y Aduanas --}}
  <div class="row mb-5">
    {{-- Formulario Nuevo Usuario --}}
    <div class="col-lg-6 mb-4">
      <div class="card shadow-sm h-100">
        <div class="card-header bg-info text-white">Nuevo usuario</div>
        <div class="card-body">
          <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            <div class="mb-3"><input name="nombre"      type="text"     class="form-control" placeholder="Nombre"></div>
            <div class="mb-3"><input name="correo"      type="email"    class="form-control" placeholder="Correo"></div>
            <div class="mb-3"><input name="cliente"     type="text"     class="form-control" placeholder="Cliente"></div>
            <div class="mb-3"><input name="perfil"      type="text"     class="form-control" placeholder="Perfil"></div>
            <div class="mb-3"><input name="aduana"      type="text"     class="form-control" placeholder="Aduana"></div>
            <div class="mb-3">
              <select name="estatus" class="form-select">
                <option value="">Estatus</option>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </form>
        </div>
      </div>
    </div>

    {{-- Panel Aduanas para interactuar --}}
    <div class="col-lg-6 mb-4">
      <div class="card shadow-sm h-100">
        <div class="card-header bg-info text-white">Aduanas para interactuar</div>
        <div class="card-body" style="min-height: 250px;">
          {{-- Aquí podrías listar checkboxes o un multi-select --}}
        </div>
      </div>
    </div>
  </div>

  {{-- Registros + Buscador --}}
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Registros</h5>
    <div class="input-group w-25">
      <span class="input-group-text">Buscar:</span>
      <input type="text" class="form-control" placeholder="Texto...">
    </div>
  </div>

  {{-- Tabla de Usuarios --}}
  <div class="table-responsive mb-4">
    <table class="table table-bordered table-hover align-middle">
      <thead class="table-light">
        <tr>
          <th class="text-center" style="width: 50px">#</th>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Perfil</th>
          <th>Estatus</th>
          <th>Permisos aduana</th>
          <th class="text-center" style="width: 80px">Editar</th>
        </tr>
      </thead>
      <tbody>
        @forelse($usuarios as $u)
          <tr>
            <td class="text-center">{{ $u->id_usuario }}</td>
            <td>{{ $u->nombre }}</td>
            <td>{{ $u->correo }}</td>
            <td>{{ $u->perfil }}</td>
            <td>
              <span class="badge {{ $u->estatus ? 'bg-success' : 'bg-secondary' }}">
                {{ $u->estatus ? 'Activo' : 'Inactivo' }}
              </span>
            </td>
            <td>{{ $u->aduana }}</td>
            <td class="text-center">
              <a href="{{ route('usuarios.edit', $u) }}" class="btn btn-sm btn-outline-primary">
                <i class="bi bi-pencil"></i>
              </a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="text-center text-muted">Sin resultados</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- Paginación --}}
  <nav>
    <ul class="pagination justify-content-center mb-0">
      @for($i = 1; $i <= 5; $i++)
        <li class="page-item {{ request('page', 1) == $i ? 'active' : '' }}">
          <a class="page-link" href="{{ route('usuarios.index', ['page' => $i]) }}">{{ $i }}</a>
        </li>
      @endfor
    </ul>
  </nav>
@endsection
