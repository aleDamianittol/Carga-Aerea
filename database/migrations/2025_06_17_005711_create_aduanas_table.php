<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void  // Añadido tipo de retorno
    {
        Schema::create('aduanas', function (Blueprint $table) {
            $table->id();
            
            // Campos de la imagen anterior
            $table->string('color', 50)->nullable();
            $table->string('patente', 50);
            $table->string('tipo', 50);
            $table->string('saai', 50)->nullable();
            $table->string('un_tarif', 50)->nullable();
            $table->string('valora', 50)->nullable();
            
            // Nuevos campos de la imagen actual
            $table->string('clave', 50)->nullable()->comment('Clave única');
            $table->string('recinto', 100)->nullable()->comment('Recinto aduanero');
            $table->string('prefijo', 20)->nullable()->comment('Prefijo');
            $table->string('proveedor', 100)->nullable()->comment('Proveedor');
            $table->string('moneda', 10)->nullable()->comment('Tipo de moneda');
            
            // Campos para acciones
            $table->boolean('activo')->default(true)->comment('Estado de la aduana');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aduanas');
    }
};