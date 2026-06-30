<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Northwind App')</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Iconos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Estilos globales de la app -->
    <link href="/css/app.css" rel="stylesheet">
    @yield('styles')
</head>
<body>

    <div id="wrapper">
        
        <!-- MENÚ LATERAL (SIDEBAR) -->
        @include('partials.sidebar')

        <!-- CONTENIDO DE LA PÁGINA -->
        <div id="page-content-wrapper" class="d-flex flex-column">
            
            <!-- Barra superior (Navbar básica con el botón de toggle) -->
            @include('partials.navbar')

            <!-- ZONA CENTRAL (CON SCROLL INDEPENDIENTE) -->
            <div class="content-area p-4">
                <div class="container-fluid">
                    
                    <!-- Título de la página -->
                    <h1 class="mb-4 text-custom-green fw-bold">@yield('titulo1')</h1>
                    
                    <!-- Card para el contenido -->
                    <div class="card shadow-sm card-custom mb-4">
                        <div class="card-header bg-white py-3">
                            <h5 class="card-title m-0 text-secondary fw-semibold">@yield('titulo2')</h5>
                        </div>
                        <div class="card-body bg-white">
                            @yield('contenido')
                        </div>
                    </div>
                    
                </div>
            </div>

            <!-- PIE DE PÁGINA FIJO -->
            @include('partials.footer')

        </div>
    </div>

    <!-- Bootstrap 5.3 Bundle con Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script para activar/esconder el menú lateral -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const wrapper = document.getElementById('wrapper');

        menuToggle.addEventListener('click', event => {
            event.preventDefault();
            wrapper.classList.toggle('toggled');
        });
    </script>

    @yield('scripts')
</body>
</html>