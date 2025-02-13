<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos - GolZone</title>
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">
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
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/aboutUs') }}">Sobre Nosotros</a></li>
                </ul>
            </div>
            <div class="search-box d-flex align-items-center">
                <input type="text" placeholder="Buscar...">
                <span>🔍</span>

            </div>

               <!-- Botón de iniciar sesión con un icono a la izquierda del carrito -->
               <a href="/login" class="ms-3 btn btn-outline-primary text-black border-black">
                <i class="bi bi-person-circle"></i> Iniciar sesión
            </a>

            <!-- Botón de carrito -->
            <a href="/cart" class="ms-3 btn btn-outline-danger text-black border-black">
                <i class="bi bi-cart-fill"></i> Carrito
            </a>
        </div>
    </nav>

    <!-- Banner Principal -->
    <section class="banner">
        <div class="container text-center text-white">
            <h1>Las Mejores Camisetas de Fútbol</h1>
            <p class="lead">Encuentra las camisetas oficiales de tus equipos favoritos al mejor precio.</p>
            <a href="{{ url('/products') }}" class="btn btn-primary btn-lg">Ver Colección</a>
        </div>
    </section>

    <!-- Productos -->
    <section class="productos my-5">
        <div class="container">
            <h2 class="text-center mb-4">Premier League 2024/2025</h2>
            <div class="row">
                @foreach($productos as $producto) <!-- Cambiar $products por $productos -->
                <div class="col-md-4 mb-4">
                    <div class="card p-5">
                        <img src="{{ asset('img/' . $producto->image) }}" class="card-img-top" alt="{{ $producto->name }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $producto->name }}</h5>
                            <p class="card-text">{{ number_format($producto->price, 2) }}€</p>
                            <div class="btn-group">
                                <button class="btn btn-outline-danger"><i class="bi bi-cart-plus-fill"></i></button>
                                <button class="btn btn-primary">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Testimonios -->
    <section class="testimonios bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Lo que dicen nuestros clientes</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-3">
                        <p class="card-text">"Las mejores camisetas al mejor precio. ¡100% recomendado!"</p>
                        <footer class="blockquote-footer">Rogolo_05</footer>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <p class="card-text">"Excelente calidad y atención al cliente. Volveré a comprar."</p>
                        <footer class="blockquote-footer">Kerry Kaberga</footer>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <p class="card-text">"Envío rápido y productos auténticos. Muy contento con mi compra."</p>
                        <footer class="blockquote-footer">Illo Juan</footer>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

</body>

</html>