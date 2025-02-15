<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carrito - GolZone</title>
    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">

    <!-- Estilos de Bootstrap -->
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
                <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/home') }}">Inicio</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/products') }}">Productos</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/contact') }}">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/aboutUs') }}">Conócenos</a></li>
                </ul>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Buscar...">
                <span>🔍</span>
            </div>
            @auth
                <!-- Texto de bienvenida -->
                <h5 class="ms-3 text-dark d-inline">
                    Bienvenido, {{ Auth::user()->name }}
                </h5>
                <!-- Botón de Cerrar sesión -->
                <a href="{{ route('logout') }}" class="ms-3 btn btn-outline-danger btn-lg text-black border-black"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <!-- Si el usuario no está autenticado, mostrar el botón de inicio de sesión -->
                <a href="{{ url('/login') }}" class="ms-3 btn btn-outline-primary text-black border-black">
                    <i class="bi bi-person-circle"></i> Registrarse
                </a>
            @endauth
            <!-- Botón de carrito -->
            <a href="/cart" class="ms-3 btn btn-outline-danger text-black border-black">
                <i class="bi bi-cart-fill"></i> Carrito
            </a>
        </div>
    </nav>

    <!-- Banner Principal -->
    <section class="banner">
        <div class="container text-center text-white">
            <h1>Carrito de Compras</h1>
            <p class="lead">Revisa los productos que has agregado a tu carrito.</p>
        </div>
    </section>

    <!-- Contenido principal (mensaje de carrito vacío) -->
    <div class="main-content">
        <div class="cart-empty text-center">
            <i class="fas fa-shopping-cart"></i>
            <h2>El carrito está vacío</h2>
            <p>¡Agrega productos a tu carrito y comienza a comprar!</p>
            <a href="{{ url('/products') }}" class="btn btn-primary btn-lg">Ver Productos</a>
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
