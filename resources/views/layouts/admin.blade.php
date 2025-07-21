<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Panel Administrativo')</title>

  <!-- Bootstrap CSS -->
  <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet"
  >
  <!-- Bootstrap Icons (opcional) -->
  <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" 
    rel="stylesheet"
  >
  <style>
    body { overflow-x: hidden; }
    #sidebar { min-height: 100vh; }
  </style>
</head>
<body>

  {{-- Topbar --}}
  <nav class="navbar navbar-dark bg-info">
    <div class="container-fluid">
      <button class="btn btn-info p-0 border-0">
        <i class="bi bi-list fs-3"></i>
      </button>
      <span class="navbar-brand mx-auto">Carga Aérea</span>
      <div class="d-flex align-items-center text-white">
        <i class="bi bi-person-circle fs-4 me-2"></i>
        <span>{{ auth()->user()->name ?? 'Invitado' }}</span>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">

      {{-- Sidebar --}}
      <nav id="sidebar" class="col-md-2 bg-secondary text-white p-3">
        <ul class="nav flex-column">
          <li class="nav-item mb-3">
            <a class="nav-link text-white" href="{{ route('roles.index') }}">
              <i class="bi bi-shield-lock-fill me-2"></i> Roles
            </a>
          </li>
          <li class="nav-item mb-3">
            <a class="nav-link text-white {{ request()->routeIs('usuarios.*') ? 'active' : '' }}"
               href="{{ route('usuarios.index') }}">
              <i class="bi bi-people-fill me-2"></i> Usuarios
            </a>
          </li>
          <li class="nav-item mb-3">
            <a class="nav-link text-white" href="{{ route('aduanas.index') }}">
              <i class="bi bi-star-fill me-2"></i> Aduanas
            </a>
          </li>
        </ul>
      </nav>

      {{-- Contenido principal --}}
      <main class="col-md-10 ms-auto px-4 py-4">
        @yield('content')
      </main>

    </div>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  ></script>
  @stack('scripts')
</body>
</html>
