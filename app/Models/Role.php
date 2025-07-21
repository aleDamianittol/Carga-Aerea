<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importación correcta
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory; // Debe venir de Eloquent

    protected $primaryKey = 'id_rol';
    protected $fillable = ['perfil', 'estatus'];
    public $timestamps = true;

    public function permisos()
    {
        return $this->belongsToMany(Permiso::class, 'permiso_role', 'role_id', 'permiso_id');
    }
}