<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cargo-Aereo.com')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .home-container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            max-width: 200px;
            height: auto;
        }
        .user-info {
            background-color: #f0f0f0;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .divider {
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #666;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="home-container">
        <!-- Logo -->
        <div class="logo-container">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Agencia" class="logo">
        </div>

        <!-- Info de usuario -->
        @auth
            <div class="user-info">
                <h2>Bienvenido, <strong>{{ auth()->user()->name }}</strong></h2>
                <p class="mb-0">Despachador de carga aérea</p>
            </div>
        @endauth

        <!-- Divider -->
        <div class="divider"></div>

        <!-- Contenido dinámico -->
        <div class="dashboard-content">
            @yield('content')
        </div>

        <!-- Logout -->
        @auth
            <div class="mt-4 text-center">
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="btn btn-danger">
                    Cerrar Sesión
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        @endauth

        <!-- Footer -->
        <div class="footer">
            © {{ date('Y') }} Carga-Aerea.com
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
