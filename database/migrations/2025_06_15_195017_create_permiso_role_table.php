<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('permiso_role')) {
            Schema::create('permiso_role', function (Blueprint $table) {
                $table->unsignedBigInteger('role_id');
                $table->unsignedBigInteger('permiso_id');
                $table->primary(['role_id', 'permiso_id']);
                
                $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
                $table->foreign('permiso_id')->references('id')->on('permisos')->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('permiso_role');
    }
};