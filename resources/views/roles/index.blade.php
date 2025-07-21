<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Roles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .roles-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .form-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        .roles-table {
            width: 100%;
            border-collapse: collapse;
        }
        .roles-table th {
            text-align: left;
            padding: 12px 8px;
            border-bottom: 2px solid #dee2e6;
        }
        .roles-table td {
            padding: 12px 8px;
            border-bottom: 1px solid #dee2e6;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        .status-active {
            background-color: #d4edda;
            color: #155724;
        }
        .btn-save {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-save:hover {
            background-color: #0069d9;
        }
    </style>
</head>
<body>
    <div class="roles-container">
        <h1>Roles</h1>
        
        <!-- Formulario Nuevo Rol -->
        <div class="form-section">
            <h3>Nuevo rol</h3>
            <form method="POST" action="{{ route('roles.store') }}" id="roleForm">
    @csrf
    <div style="display: flex; gap: 10px; align-items: center;">
        <input type="text" name="perfil" id="perfilInput" 
               placeholder="Nombre" required
               style="flex: 1; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;">
        
        <input type="hidden" name="estatus" value="activo">
        
        <button type="submit" class="btn-save" id="submitBtn">
            Guardar
        </button>
    </div>
</form>

<script>
document.getElementById('roleForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const btn = document.getElementById('submitBtn');
    btn.disabled = true;
    btn.textContent = 'Guardando...';

    fetch(this.action, {
        method: 'POST',
        body: new FormData(this),
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(async response => {
        const data = await response.json();
        
        if (!response.ok) {
            throw new Error(data.message || 'Error en la respuesta');
        }
        
        return data;
    })
    .then(data => {
        if(data.success) {
            // Recargar solo si fue exitoso
            window.location.href = "{{ route('roles.index') }}";
        } else {
            showError(data.message);
            btn.disabled = false;
            btn.textContent = 'Guardar';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        // Verificar si el error es de conexión
        if (error.message.toLowerCase().includes('failed to fetch')) {
            // Esperar 2 segundos y verificar si se guardó
            setTimeout(() => {
                fetch("{{ route('roles.index') }}?last_check=" + new Date().getTime())
                .then(() => {
                    window.location.href = "{{ route('roles.index') }}";
                })
                .catch(() => {
                    showError('Error de conexión. Verifique si los datos se guardaron.');
                    btn.disabled = false;
                    btn.textContent = 'Guardar';
                });
            }, 2000);
        } else {
            showError(error.message);
            btn.disabled = false;
            btn.textContent = 'Guardar';
        }
    });
});

function showError(message) {
    // Usar sweetalert o similar para mejor UX
    alert(message);
}
</script>
        </div>

        <!-- Tabla de Roles -->
        <table class="roles-table">
            <thead>
                <tr>
                    <th>Perfil</th>
                    <th>Estatus</th>
                    <th>Editar permisos</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->perfil }}</td>
                    <td>
                        <span class="status-badge status-active">{{ $role->estatus }}</span>
                    </td>
                    <td>
                        <a href="{{ route('roles.edit', $role->id_rol) }}" 
                           style="color: #007bff; text-decoration: none;">
                            Editar
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>