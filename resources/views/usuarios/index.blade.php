@extends('layouts.admin')

@section('title', 'Gestión de Usuarios')

@section('content')
<div class="flex min-h-screen bg-gray-100">

    <!-- Sidebar -->
    <aside class="w-1/6 bg-cyan-900 text-white p-4 space-y-4">
        <div class="text-center font-bold text-lg mb-8">
            <div class="bg-gray-500 h-12 mb-4">Imagen Logo agencia</div>
        </div>
        <nav class="space-y-2">
            <a href="#" class="flex items-center gap-2 hover:bg-cyan-700 p-2 rounded"><span>📄</span> Roles</a>
            <a href="#" class="flex items-center gap-2 bg-cyan-700 p-2 rounded"><span>👤</span> Usuarios</a>
            <a href="#" class="flex items-center gap-2 hover:bg-cyan-700 p-2 rounded"><span>➕</span> Aduanas</a>
        </nav>
    </aside>

    <!-- Main content -->
    <main class="w-5/6 p-6">
        <!-- Header -->
        <div class="flex justify-between items-center bg-white p-4 mb-4 rounded shadow">
            <h1 class="text-xl font-semibold">Usuarios</h1>
            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-600">nombre de usuario</span>
                <span class="text-2xl">👤</span>
            </div>
        </div>

        <!-- Formulario -->
        <div class="bg-blue-100 p-4 rounded-t-md border border-gray-300">
            <h2 class="text-md font-semibold mb-4">Nuevo usuario</h2>
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-2 space-y-2">
                    <input type="text" placeholder="Nombre" class="w-full p-2 border rounded">
                    <input type="email" placeholder="Correo" class="w-full p-2 border rounded">
                    <input type="text" placeholder="Perfil" class="w-full p-2 border rounded">
                    <input type="text" placeholder="Estatus" class="w-full p-2 border rounded">
                </div>
                <div class="col-span-1">
                    <label class="block mb-1">Aduanas para interactuar</label>
                    <textarea class="w-full h-28 p-2 border rounded resize-none"></textarea>
                </div>
            </div>
            <div class="text-right mt-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
            </div>
        </div>

        <!-- Tabla de usuarios -->
        <div class="bg-white border border-gray-300 p-4 rounded-b-md">
            <div class="flex justify-between mb-2">
                <span class="text-sm">Registros</span>
                <div>
                    <label for="buscar" class="mr-2 text-sm">Buscar:</label>
                    <input id="buscar" type="text" class="p-1 border rounded text-sm">
                </div>
            </div>

            <table class="w-full border-collapse border text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-2 py-1">#</th>
                        <th class="border px-2 py-1">Nombre</th>
                        <th class="border px-2 py-1">Correo</th>
                        <th class="border px-2 py-1">Perfil</th>
                        <th class="border px-2 py-1">Estatus</th>
                        <th class="border px-2 py-1">Permisos aduana</th>
                        <th class="border px-2 py-1">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Ejemplo de fila -->
                    <tr>
                        <td class="border px-2 py-1 text-center">1</td>
                        <td class="border px-2 py-1">Alejandro</td>
                        <td class="border px-2 py-1">alejandro@mail.com</td>
                        <td class="border px-2 py-1">Admin</td>
                        <td class="border px-2 py-1 text-center">Activo</td>
                        <td class="border px-2 py-1">Aduana 1, Aduana 2</td>
                        <td class="border px-2 py-1 text-center"><button class="text-blue-600">Editar</button></td>
                    </tr>
                </tbody>
            </table>

            <!-- Paginación -->
            <div class="text-center mt-4 space-x-2">
                <button class="px-2 py-1 border rounded text-sm bg-white hover:bg-gray-100">1</button>
                <button class="px-2 py-1 border rounded text-sm bg-white hover:bg-gray-100">2</button>
                <button class="px-2 py-1 border rounded text-sm bg-white hover:bg-gray-100">3</button>
                <button class="px-2 py-1 border rounded text-sm bg-white hover:bg-gray-100">4</button>
                <button class="px-2 py-1 border rounded text-sm bg-white hover:bg-gray-100">5</button>
            </div>
        </div>
    </main>
</div>
@endsection
