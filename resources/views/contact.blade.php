<!-- resources/views/contact.blade.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contacto - GolZone</title>
    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Estilos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/Isotipo.png') }}" class="card-img-top" alt="Isotipo GolZone">
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
    <div class="container mt-5">
        <div class="contact-form">
            <h2>Formulario de Contacto</h2>
            <form method="POST" action="{{ route('contact.submit') }}">
                @csrf
                <!-- Nombre -->
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Introduce tu nombre" required>
                </div>
                <!-- Apellidos -->
                <div class="form-group">
                    <label for="last_name">Apellidos</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Introduce tus apellidos" required>
                </div>
                <!-- Email -->
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Introduce tu email" required>
                </div>
                <!-- Botón de enviar -->
                <button type="submit" class="btn mt-3">Enviar</button>
            </form>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>