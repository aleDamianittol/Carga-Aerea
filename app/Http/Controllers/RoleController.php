<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('perfil')->get();
        return view('roles.index', compact('roles'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'perfil' => 'required|string|max:50|unique:roles,perfil',
            'estatus' => 'required|in:activo,inactivo'
        ]);

        try {
            $role = Role::create($validatedData);
            
            return redirect()->route('roles.index')
                ->with('success', 'Rol creado exitosamente');
                
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error al guardar: ' . $e->getMessage());
        }
    }
    public function edit($id_rol)
    {
        $role = Role::with('permisos')->findOrFail($id_rol);
        $allPermisos = Permiso::all();
        
        return view('roles.edit', [
            'role' => $role,
            'permisos' => $allPermisos,
            'selectedPermisos' => $role->permisos->pluck('id')->toArray()
        ]);
    }

    public function update(Request $request, $id_rol)
    {
        $role = Role::findOrFail($id_rol);
        
        $validated = $request->validate([
            'perfil' => 'required|string|max:50|unique:roles,perfil,'.$role->id_rol.',id_rol',
            'estatus' => 'required|in:activo,inactivo'
        ]);
        
        $role->update($validated);
        
        return redirect()->route('roles.index')
            ->with('success', 'Rol actualizado exitosamente');
    }
    public function editPermisos($id_rol)
    {
        // Verificar que el modelo Permiso existe y está importado
        if (!class_exists(Permiso::class)) {
            abort(500, 'El modelo Permiso no existe');
        }
    
        $role = Role::with('permisos')->findOrFail($id_rol);
        
        // Depuración: Verificar si hay permisos en la base de datos
        $permisos = Permiso::orderBy('nombre')->get();
        
        if ($permisos->isEmpty()) {
            \Log::warning('No se encontraron permisos en la base de datos');
        }
    
        return view('roles.edit-permisos', compact('role', 'permisos'));
    }

    public function updatePermisos(Request $request, $id_rol)
    {
        DB::beginTransaction();
        
        try {
            $role = Role::findOrFail($id_rol);
            
            $request->validate([
                'permisos' => 'nullable|array',
                'permisos.*' => 'exists:permisos,id'
            ]);
            
            $role->permisos()->sync($request->permisos ?? []);
            
            DB::commit();
            
            return redirect()->route('roles.index')
                 ->with('success', 'Permisos actualizados correctamente');
                 
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Error al actualizar permisos: ' . $e->getMessage());
        }
    }
}