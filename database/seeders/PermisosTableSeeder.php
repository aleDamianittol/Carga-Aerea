<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permiso; // Importación correcta del modelo

class PermisosTableSeeder extends Seeder
{
    public function run()
    {
        $permisos = [
            ['nombre' => 'Crear usuarios', 'descripcion' => 'Permite crear nuevos usuarios'],
            ['nombre' => 'Editar contenido', 'descripcion' => 'Permite modificar contenido existente'],
            ['nombre' => 'Eliminar registros', 'descripcion' => 'Permite eliminar registros'],
            ['nombre' => 'Ver reportes', 'descripcion' => 'Permite acceder a reportes'],
            ['nombre' => 'Configurar sistema', 'descripcion' => 'Permite cambiar configuraciones']
        ];

        foreach ($permisos as $permiso) {
            Permiso::firstOrCreate(
                ['nombre' => $permiso['nombre']],
                $permiso
            );
        }
    }
}