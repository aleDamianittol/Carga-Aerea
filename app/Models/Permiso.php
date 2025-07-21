<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importación correcta
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory; // Debe venir de Eloquent

    protected $fillable = ['nombre', 'descripcion'];
    public $timestamps = true;

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permiso_role', 'permiso_id', 'role_id');
    }
}