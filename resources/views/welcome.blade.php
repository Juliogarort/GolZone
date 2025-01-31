<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GolZone</title>
    <!-- Enlace correcto al archivo CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="logo.png" alt="Logo"> GolZone
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link text-dark" href="#">Productos</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/contact') }}">Contacto</a></li> <!-- Enlace actualizado -->
                <li class="nav-item"><a class="nav-link text-dark" href="#">Sobre Nosotros</a></li>
            </ul>
        </div>
        <div class="search-box">
            <input type="text" placeholder="Buscar...">
            <span>🔍</span>
        </div>
    </div>
</nav>

<!-- Contenido principal -->
<div class="container my-5">
    <h1 class="text-center">Bienvenido a GolZone</h1>
</div>

<!-- Footer -->
<footer class="footer text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <p>
                    <a href="#">Instagram @GolZone_</a> |
                    <a href="#">Twitter @GolZone_</a>
                </p>
            </div>
            <div class="col-md-4">
                <p>
                    <a href="#">Facebook @GolZone_</a> |
                    <a href="#">TikTok @GolZone_</a>
                </p>
            </div>
            <div class="col-md-4">
                <p>📞 +34 123 456 789 | ✉️ info@golzone.com</p>
                <a href="{{ url('/contact') }}">Formulario de Contacto</a> <!-- Enlace actualizado -->
            </div>
        </div>
    </div>
</footer>

</body>
</html>
