<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incluye Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Incluye Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('tienda.index') }}">🛍️ Tienda</a>
            <a class="nav-link text-white" href="{{ route('perfil') }}">👤 Perfil</a>
            <a class="nav-link text-white" href="{{ route('tienda.carrito') }}">🛒 Carrito</a>
        </div>
    </nav>


    <div class="container">
        @yield('content')
    </div>

    <script src="{{ asset('js/tienda.js') }}"></script>
</body>

</html>
