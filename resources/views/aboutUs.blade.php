<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sobre Nosotros - GolZone</title>
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
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
            <div class="search-box">
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

    <!-- Contenido sobre la empresa -->
    <section class="sobre-nosotros py-5">
    <div class="container">
        <!-- Contenedor único para todos los apartados -->
        <div class="informacion-general">
            <!-- Sección de Nuestra Historia -->
            <div class="nuestra-historia">
                <h2>Nuestra Historia</h2>
                <p>
                    En GolZone, nos apasiona ofrecer a nuestros clientes las mejores camisetas de fútbol de las ligas más importantes del mundo. 
                    Desde nuestros inicios, hemos trabajado con los mejores proveedores para garantizar productos auténticos y de calidad.
                </p>
                <p>
                    Nos enorgullece ser una empresa que promueve el deporte, la autenticidad y la pasión por el fútbol. 
                    GolZone no es solo una tienda, sino un espacio donde los fanáticos pueden encontrar lo mejor para apoyar a su equipo.
                </p>
            </div>

            <!-- Sección de Misión -->
            <div class="mision">
                <h2>Misión</h2>
                <p>
                    Nuestra misión es ofrecer una experiencia única a los amantes del fútbol, brindándoles productos auténticos y de alta calidad para que puedan 
                    apoyar a sus equipos favoritos con orgullo. Buscamos ser la tienda de referencia para los fanáticos, proporcionando un servicio al cliente excepcional.
                </p>
            </div>

            <!-- Sección de Visión -->
            <div class="vision">
                <h2>Visión</h2>
                <p>
                    Queremos ser la tienda líder en camisetas deportivas, ofreciendo a nuestros clientes una amplia gama de productos y garantizando siempre la mejor calidad. 
                    Nos esforzamos por expandirnos a nivel internacional y llevar el amor por el fútbol a cada rincón del mundo.
                </p>
            </div>

            <!-- Sección de Valores -->
            <div class="valores">
                <h2>Valores</h2>
                <ul>
                    <li><strong>Pasión:</strong> Nuestra pasión por el fútbol se refleja en cada camiseta que vendemos.</li>
                    <li><strong>Calidad:</strong> Nos aseguramos de ofrecer productos de la mejor calidad para nuestros clientes.</li>
                    <li><strong>Compromiso:</strong> Estamos comprometidos con la satisfacción de nuestros clientes y su experiencia de compra.</li>
                    <li><strong>Innovación:</strong> Buscamos siempre nuevas formas de mejorar nuestra oferta y servicio.</li>
                </ul>
            </div>
        </div>
    </div>
</section>





    <!-- Mapa -->
    <section class="mapa py-5">
    <div class="container">
        <h2 class="text-center mb-4">Visítanos</h2>
        <div class="row">
            <div class="col-md-12">
                <!-- Mapa con coordenadas del Estadio Benito Villamarín, Sevilla -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19935.069464363444!2d-5.9780!3d37.3785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0e2f1ff4c9a587%3A0x4472783b52f05f7!2sEstadio%20Benito%20Villamar%C3%ADn%2C%20Sevilla%2C%20España!5e0!3m2!1ses-419!2ses!4v1676045414211!5m2!1ses-419!2ses" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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