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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                    <li class="nav-item"><a class="nav-link text-dark" href="/">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/products') }}">Productos</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/contact') }}">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="/about">Sobre Nosotros</a></li>
                </ul>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Buscar...">
                <span>🔍</span>
                
            </div>
             <!-- Botón de carrito -->
             <a href="/cart" class="ms-3 btn btn-outline-danger text-black border-black">
                    <i class="bi bi-cart-fill"></i> Carrito
                </a>
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

        <!-- Footer -->
<footer class="footer text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="social-icons">
                    <a href="#" class="social-link">
                        <i class="fab fa-instagram"></i>
                        <span>@GolZone_</span>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-twitter"></i>
                        <span>@GolZone_</span>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-facebook"></i>
                        <span>@GolZone_</span>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-tiktok"></i>
                        <span>@GolZone_</span>
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                <p>
                    <i class="fas fa-phone"></i> +34 123 456 789 |
                    <i class="fas fa-envelope"></i> info@golzone.com
                </p>
                <a href="{{ url('/contact') }}" class="contact-link">
                    <i class="fas fa-file-alt"></i>
                    Formulario de Contacto
                </a>
            </div>
        </div>
    </div>
</footer>
    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>