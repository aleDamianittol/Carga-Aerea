<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AduanaController; 

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    // Usuarios

    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
    
    
    // Roles (usando Route::resource + rutas adicionales)
    Route::prefix('roles')->group(function () {
        Route::resource('', RoleController::class)->names('roles')
            ->parameters(['' => 'role']); // Para usar {role} en lugar de {id}
        
        // Rutas adicionales para permisos
        Route::get('/{role}/permisos', [RoleController::class, 'editPermisos'])
             ->name('roles.edit-permisos');
        Route::put('/{role}/permisos', [RoleController::class, 'updatePermisos'])
             ->name('roles.update-permisos');
    });


    Route::get('/gestion-aduanas', [AduanaController::class, 'gestion'])->name('aduanas.gestion');


});