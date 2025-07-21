<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permisos de Rol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .permisos-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .role-header {
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .permisos-table {
            width: 100%;
            margin: 20px 0;
        }
        .permisos-table th, .permisos-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .permisos-table th {
            background-color: #f8f9fa;
            font-weight: 600;
        }
        .action-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }
        .btn-custom {
            padding: 8px 20px;
            border-radius: 4px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="permisos-container">
        <div class="role-header">
            <h2>Roles * Permisos de roles</h2>
            
            <table class="permisos-table">
                <tr>
                    <th width="30%">Nombre rol</th>
                    <td>{{ $role->perfil }}</td>
                </tr>
            </table>
        </div>

        <h5>Permiso para</h5>
        
        <form method="POST" action="{{ route('roles.update-permisos', $role->id_rol) }}">
            @csrf
            @method('PUT')
            
            <table class="permisos-table">
                <thead>
                    <tr>
                        <th>Nombre de permiso</th>
                        <th>Activo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permisos as $permiso)
                    <tr>
                        <td>{{ $permiso->nombre }}</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" 
                                       name="permisos[]" value="{{ $permiso->id }}"
                                       id="permiso_{{ $permiso->id }}"
                                       @if($role->permisos->contains($permiso->id)) checked @endif>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="action-buttons">
                <a href="{{ route('roles.index') }}" class="btn btn-custom btn-light">
                    Cancelar
                </a>
                <button type="submit" class="btn btn-custom btn-primary">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</body>
</html>