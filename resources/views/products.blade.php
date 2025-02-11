<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos - GolZone</title>
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
                    <li class="nav-item"><a class="nav-link text-dark" href="/products">Productos</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="/contact">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="/about">Sobre Nosotros</a></li>
                </ul>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Buscar...">
                <span>🔍</span>
            </div>
        </div>
    </nav>

    <!-- Banner -->
    <section class="banner text-center text-white">
        <h1>Encuentra Tu Camiseta Favorita</h1>
        <p class="lead">Las mejores camisetas de las ligas más importantes del mundo.</p>
    </section>

    <!-- Productos -->
    <section class="productos my-5">
        <div class="container">
            <h2 class="text-center mb-4">Premier League 2024/2025</h2>
            <div class="row">
                <!-- Premier -->
                <div class="col-md-4 mb-4" v-for="producto in productos">
                    <div class="card p-5">
                    <img src="{{ asset('img/CamisetaChelsea.jpg') }}" class="card-img-top" alt="Camiseta 1">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camiseta Chelsea 2024/2025</h5>
                            <p class="card-text">89,99€</p>
                            <div class="btn-group">
                                <button class="btn btn-outline-danger"><i class="bi bi-cart-plus-fill"></i></button>
                                <button class="btn btn-primary">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" v-for="producto in productos">
                    <div class="card p-5">
                    <img src="{{ asset('img/CamisetaArsenal.jpg') }}" class="card-img-top" alt="Camiseta 2">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camiseta Arsenal 2024/2025</h5>
                            <p class="card-text">89,99€</p>
                            <div class="btn-group">
                                <button class="btn btn-outline-danger"><i class="bi bi-cart-plus-fill"></i></button>
                                <button class="btn btn-primary">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" v-for="producto in productos">
                    <div class="card p-5">
                    <img src="{{ asset('img/CamisetaArsenal.jpg') }}" class="card-img-top" alt="Camiseta 3">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camiseta Liverpool 2024/2025</h5>
                            <p class="card-text">89,99€</p>
                            <div class="btn-group">
                                <button class="btn btn-outline-danger"><i class="bi bi-cart-plus-fill"></i></button>
                                <button class="btn btn-primary">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>

            <h2 class="text-center mb-4">La Liga 2024/2025</h2>
            <div class="row">
                <!-- La Liga -->
                <div class="col-md-4 mb-4" v-for="producto in productos">
                    <div class="card p-5">
                    <img src="{{ asset('img/CamisetaMadrid.jpg') }}" class="card-img-top" alt="Camiseta 1">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camiseta Real Madrid 2024/2025</h5>
                            <p class="card-text">89,99€</p>
                            <div class="btn-group">
                                <button class="btn btn-outline-danger"><i class="bi bi-cart-plus-fill"></i></button>
                                <button class="btn btn-primary">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" v-for="producto in productos">
                    <div class="card p-5">
                    <img src="{{ asset('img/CamisetaBarcelona.jpg') }}" class="card-img-top" alt="Camiseta 2">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camiseta FC Barcelona 2024/2025</h5>
                            <p class="card-text">89,99€</p>
                            <div class="btn-group">
                                <button class="btn btn-outline-danger"><i class="bi bi-cart-plus-fill"></i></button>
                                <button class="btn btn-primary">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" v-for="producto in productos">
                    <div class="card p-5">
                    <img src="{{ asset('img/CamisetaAtlético.jpg') }}" class="card-img-top" alt="Camiseta 3">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camiseta Atlético de Madrid 2024/2025</h5>
                            <p class="card-text">89,99€</p>
                            <div class="btn-group">
                                <button class="btn btn-outline-danger"><i class="bi bi-cart-plus-fill"></i></button>
                                <button class="btn btn-primary">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 class="text-center mb-4">Serie A 2024/2025</h2>
            <div class="row">
                <!-- Serie A -->
                <div class="col-md-4 mb-4" v-for="producto in productos">
                    <div class="card p-5">
                    <img src="{{ asset('img/CamisetaNapoles.jpg') }}" class="card-img-top" alt="Camiseta 1">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camiseta Nápoles 2024/2025</h5>
                            <p class="card-text">89,99€</p>
                            <div class="btn-group">
                                <button class="btn btn-outline-danger"><i class="bi bi-cart-plus-fill"></i></button>
                                <button class="btn btn-primary">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" v-for="producto in productos">
                    <div class="card p-5">
                    <img src="{{ asset('img/CamisetaInter.jpg') }}" class="card-img-top" alt="Camiseta 2">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camiseta Inter de Milán 2024/2025</h5>
                            <p class="card-text">89,99€</p>
                            <div class="btn-group">
                                <button class="btn btn-outline-danger"><i class="bi bi-cart-plus-fill"></i></button>
                                <button class="btn btn-primary">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" v-for="producto in productos">
                    <div class="card p-5">
                    <img src="{{ asset('img/CamisetaMilan.jpg') }}" class="card-img-top" alt="Camiseta 3">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camiseta AC Milán 2024/2025</h5>
                            <p class="card-text">89,99€</p>
                            <div class="btn-group">
                                <button class="btn btn-outline-danger"><i class="bi bi-cart-plus-fill"></i></button>
                                <button class="btn btn-primary">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 class="text-center mb-4">Bundesliga 2024/2025</h2>
            <div class="row">
                <!-- Bundesliga -->
                <div class="col-md-4 mb-4" v-for="producto in productos">
                    <div class="card p-5">
                    <img src="{{ asset('img/CamisetaBayern.jpg') }}" class="card-img-top" alt="Camiseta 1">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camiseta FC Bayern Múnich 2024/2025</h5>
                            <p class="card-text">89,99€</p>
                            <div class="btn-group">
                                <button class="btn btn-outline-danger"><i class="bi bi-cart-plus-fill"></i></button>
                                <button class="btn btn-primary">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" v-for="producto in productos">
                    <div class="card p-5">
                    <img src="{{ asset('img/CamisetaDortmund.jpg') }}" class="card-img-top" alt="Camiseta 2">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camiseta Borussia Dortmund 2024/2025</h5>
                            <p class="card-text">89,99€</p>
                            <div class="btn-group">
                                <button class="btn btn-outline-danger"><i class="bi bi-cart-plus-fill"></i></button>
                                <button class="btn btn-primary">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" v-for="producto in productos">
                    <div class="card p-5">
                    <img src="{{ asset('img/CamisetaLeverkusen.jpg') }}" class="card-img-top" alt="Camiseta 3">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camiseta Bayern Leverkusen 2024/2025</h5>
                            <p class="card-text">89,99€</p>
                            <div class="btn-group">
                                <button class="btn btn-outline-danger"><i class="bi bi-cart-plus-fill"></i></button>
                                <button class="btn btn-primary">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 class="text-center mb-4">Ligue 1</h2>
            <div class="row">
                <!-- Ligue 1 -->
                <div class="col-md-4 mb-4" v-for="producto in productos">
                    <div class="card p-5">
                    <img src="{{ asset('img/CamisetaPSG.jpg') }}" class="card-img-top" alt="Camiseta 1">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camiseta Paris Saint-Germaint 2024/2025</h5>
                            <p class="card-text">89,99€</p>
                            <div class="btn-group">
                                <button class="btn btn-outline-danger"><i class="bi bi-cart-plus-fill"></i></button>
                                <button class="btn btn-primary">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" v-for="producto in productos">
                    <div class="card p-5">
                    <img src="{{ asset('img/CamisetaLyon.jpg') }}" class="card-img-top" alt="Camiseta 2">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camiseta Olympique de Lyon 2024/2025</h5>
                            <p class="card-text">89,99€</p>
                            <div class="btn-group">
                                <button class="btn btn-outline-danger"><i class="bi bi-cart-plus-fill"></i></button>
                                <button class="btn btn-primary">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" v-for="producto in productos">
                    <div class="card p-5">
                    <img src="{{ asset('img/CamisetaMarsella.jpg') }}" class="card-img-top" alt="Camiseta 3">
                        <div class="card-body text-center">
                            <h5 class="card-title">Camiseta Olympique de Marseille 2024/2025</h5>
                            <p class="card-text">89,99€</p>
                            <div class="btn-group">
                                <button class="btn btn-outline-danger"><i class="bi bi-cart-plus-fill"></i></button>
                                <button class="btn btn-primary">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin Producto -->
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
