<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AduanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Aduana::create([
            'patente' => 'TEST001',
            'tipo' => 'Importación',
            'color' => '#FF5733',
            'clave' => 'CLAVE-001',
            'recinto' => 'Recinto Principal',
            'prefijo' => 'IMP',
            'proveedor' => 'Proveedor Ejemplo S.A.',
            'moneda' => 'USD',
            'activo' => true
        ]);
        
        // Agrega más registros si es necesario
    }
}
