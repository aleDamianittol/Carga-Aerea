@extends('layouts.app')

@section('title', 'Gestión de Usuarios')

@section('content')
<div class="min-h-screen bg-gray-50 p-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Gestión de Usuarios</h1>
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Nuevo Usuario
            </button>
        </div>

        <!-- Card Container -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <!-- Formulario -->
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Registrar Nuevo Usuario</h2>
                <form class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                            <input type="text" placeholder="Nombre completo" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Correo</label>
                            <input type="email" placeholder="Correo electrónico" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Cliente</label>
                            <input type="text" placeholder="Cliente asociado" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Perfil</label>
                            <input type="text" placeholder="Perfil de usuario" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Aduana</label>
                            <input type="text" placeholder="Aduana asignada" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Estatus</label>
                            <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                <option value="">Seleccionar estatus</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                            <input type="password" placeholder="Contraseña temporal" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition duration-200">
                            Registrar Usuario
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tabla de usuarios -->
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-gray-700">Listado de Usuarios</h2>
                    <div class="relative">
                        <input type="text" placeholder="Buscar usuario..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-2.5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead class="bg-gray-100 text-gray-600 uppercase text-sm">
                            <tr>
                                <th class="py-3 px-4 text-left font-medium">ID</th>
                                <th class="py-3 px-4 text-left font-medium">Nombre</th>
                                <th class="py-3 px-4 text-left font-medium">Correo</th>
                                <th class="py-3 px-4 text-left font-medium">Estatus</th>
                                <th class="py-3 px-4 text-left font-medium">Cliente</th>
                                <th class="py-3 px-4 text-left font-medium">Perfil</th>
                                <th class="py-3 px-4 text-left font-medium">Aduana</th>
                                <th class="py-3 px-4 text-left font-medium">Rol</th>
                                <th class="py-3 px-4 text-left font-medium">ID Aduana</th>
                                <th class="py-3 px-4 text-left font-medium">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @forelse ($usuarios as $usuario)
                                <tr class="border-t border-gray-200 hover:bg-gray-50 transition">
                                    <td class="py-3 px-4">{{ $usuario['id_usuario'] }}</td>
                                    <td class="py-3 px-4 font-medium">{{ $usuario['nombre'] }}</td>
                                    <td class="py-3 px-4">{{ $usuario['correo'] }}</td>
                                    <td class="py-3 px-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $usuario['estatus'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $usuario['estatus'] ? 'Activo' : 'Inactivo' }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">{{ $usuario['cliente'] }}</td>
                                    <td class="py-3 px-4">{{ $usuario['perfil'] }}</td>
                                    <td class="py-3 px-4">{{ $usuario['aduana'] }}</td>
                                    <td class="py-3 px-4">{{ $usuario['id_rol'] }}</td>
                                    <td class="py-3 px-4">{{ $usuario['id_aduana'] }}</td>
                                    <td class="py-3 px-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800 transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                            </button>
                                            <button class="text-red-600 hover:text-red-800 transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="py-4 px-4 text-center text-gray-500">No se encontraron usuarios registrados</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="flex justify-between items-center mt-6 border-t border-gray-200 pt-4">
                    <div class="text-sm text-gray-600">
                        Mostrando <span class="font-medium">1</span> a <span class="font-medium">10</span> de <span class="font-medium">25</span> resultados
                    </div>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-100 transition">Anterior</button>
                        <button class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">1</button>
                        <button class="px-3 py-1 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-100 transition">2</button>
                        <button class="px-3 py-1 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-100 transition">3</button>
                        <button class="px-3 py-1 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-100 transition">Siguiente</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection