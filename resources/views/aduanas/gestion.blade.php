@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestión de Aduanas - Advances</h1>
    
    <div class="mb-3">
        <a href="{{ route('aduanas.create') }}" class="btn btn-primary">
            Nuevo Registro
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Color</th>
                    <th>Patente</th>
                    <th>Tipo</th>
                    <th>Clave</th>
                    <th>Recinto</th>
                    <th>Prefijo</th>
                    <th>Provedor</th>
                    <th>Moneda</th>
                    <th>Incateno</th>
                    <th>Frac. Ben</th>
                    <th>Frac. Lib</th>
                    <th>UN. Cove</th>
                    <th>Un. SAAI</th>
                    <th>Un. Tarif</th>
                    <th>Valoracion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($advances as $advance)
                <tr>
                    <td>{{ $advance->color ?? '' }}</td>
                    <td>{{ $advance->patente ?? '' }}</td>
                    <td>{{ $advance->tipo ?? '' }}</td>
                    <td>{{ $advance->clave ?? '' }}</td>
                    <td>{{ $advance->recinto ?? '' }}</td>
                    <td>{{ $advance->prefijo ?? '' }}</td>
                    <td>{{ $advance->provedor ?? '' }}</td>
                    <td>{{ $advance->moneda ?? '' }}</td>
                    <td>{{ $advance->incateno ?? '' }}</td>
                    <td>{{ $advance->frac_ben ?? '' }}</td>
                    <td>{{ $advance->frac_lib ?? '' }}</td>
                    <td>{{ $advance->un_cove ?? '' }}</td>
                    <td>{{ $advance->un_saai ?? '' }}</td>
                    <td>{{ $advance->un_tarif ?? '' }}</td>
                    <td>{{ $advance->valoracion ?? '' }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning">Editar</a>
                        <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection