@extends('layouts.app')

@section('title', 'GolZone - Bienvenido')

@section('head')

    <link rel="stylesheet" href="{{ asset('css/banner.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carrusel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/productosDestacados.css') }}">
    <link rel="stylesheet" href="{{ asset('css/parallax.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tarjetas.css') }}">
    <link rel="stylesheet" href="{{ asset('css/testimonios.css') }}">
    <script src="{{ asset('js/carrusel.js') }}"></script>
@endsection

@section('content')

    
    <!-- Banner Principal -->
    <section class="banner">
        <div class="container text-center text-white">
            <h1>Las Mejores Camisetas de Fútbol</h1>
            <p class="lead">Encuentra las camisetas oficiales de tus equipos favoritos al mejor precio.</p>
            <a href="{{ url('/products') }}" class="btn btn-primary btn-lg">Ver Colección</a>
        </div>
    </section>

    <section class="carrusel">
        <div class="carrusel-imagenes">
            <div class="carrusel-slide active" id="imagenCarrusel1"></div>
            <div class="carrusel-slide" id="imagenCarrusel2"></div>
            <div class="carrusel-slide" id="imagenCarrusel3"></div>
        </div>
        <div class="carrusel-texto">
            <h1>GOL ZONE</h1>
            <p>Encuentra las camisetas oficiales de tus equipos favoritos al mejor precio</p>
            <div class="carrusel-botones">
                <a href="{{ url('/contact') }}" class="boton contacto">Contactar</a>
                <a href="{{ url('/products') }}" class="boton comprar">Comprar</a>
            </div>
        </div>
    </section>



    <!-- Productos Destacados -->
    <section class="productos-destacados my-5">
        <div class="container">
            <h2 class="text-center mb-4">Productos Destacados</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-4 border-2">
                        <img src="{{ asset('img/cami-futbol.jpg') }}" class="card-img-top" alt="Camiseta 1">
                        <div class="card-body">
                            <h5 class="card-title fs-4">Camiseta Real Madrid</h5>
                            <div class="d-flex">
                                <p class="card-text fs-5 mx-2">€49.99</p>
                                <p class="card-text text-warning text-decoration-line-through text-sm ">€49.99</p>
                            </div>
                            <div class="btn-group d-flex" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-outline-danger"><i
                                        class="bi bi-cart-plus-fill"></i></button>
                                <button type="button" class="btn btn-primary">Middle</button>
                                <button type="button" class="btn btn-primary">Right</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('img/cami-futbol.jpg') }}" class="card-img-top" alt="Camiseta 2">
                        <div class="card-body">
                            <h5 class="card-title">Camiseta FC Barcelona</h5>
                            <p class="card-text">€49.99</p>
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0">
                                        </path>
                                    </svg>
                                    <span class="visually-hidden">Button</span>
                                </button>
                                <button type="button" class="btn btn-outline-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0">
                                        </path>
                                    </svg>
                                    <span class="visually-hidden">Button</span>
                                </button>
                                <button type="button" class="btn btn-outline-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0">
                                        </path>
                                    </svg>
                                    <span class="visually-hidden">Button</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('img/cami-futbol.jpg') }}" class="card-img-top" alt="Camiseta 3">
                        <div class="card-body">
                            <h5 class="card-title">Camiseta Manchester United</h5>
                            <p class="card-text">€49.99</p>
                            <a href="#" class="btn btn-primary">Comprar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Parallax -->
    <div class="parallax-container">
        <section class="parallax parallax-1">
            <div class="overlay">
                <h1>Las Mejores Camisetas de Fútbol</h1>
            </div>
        </section>

        <section class="content">
            <p>Descubre las mejores camisetas de fútbol de tus equipos favoritas.</p>
        </section>
    </div>


    <!-- Categorías -->
    <section class="container my-5">
        <div class="row g-4">
            <!-- Tarjeta: Todas las camisetas -->
            <div class="col-md-6">
                <a href="{{ route('products.index') }}" class="filter-card"
                    style="background-image: url('{{ asset('img/tarjetatodo.jpg') }}');">
                    <div class="overlay"></div>
                    <h3 class="filter-title">Todas las camisetas</h3>
                </a>
            </div>

            <!-- Tarjeta: Camisetas Estándar -->
            <div class="col-md-6">
                <a href="{{ route('products.index', ['type' => 'Estandar']) }}" class="filter-card"
                    style="background-image: url('{{ asset('img/tarjetaestandar.jpg') }}');">
                    <div class="overlay"></div>
                    <h3 class="filter-title">Camisetas Estándar</h3>
                </a>
            </div>

            <!-- Tarjeta: Camisetas Exclusivas -->
            <div class="col-md-6">
                <a href="{{ route('products.index', ['type' => 'Exclusivo']) }}" class="filter-card"
                    style="background-image: url('{{ asset('img/tarjetaexclusiva.jpg') }}');">
                    <div class="overlay"></div>
                    <h3 class="filter-title">Camisetas Exclusivas</h3>
                </a>
            </div>

            <!-- Tarjeta: Camisetas Retro -->
            <div class="col-md-6">
                <a href="{{ route('products.index', ['type' => 'Retro']) }}" class="filter-card"
                    style="background-image: url('{{ asset('img/tarjetaretro.jpg') }}');">
                    <div class="overlay"></div>
                    <h3 class="filter-title">Camisetas Retro</h3>
                </a>
            </div>
        </div>
    </section>




    <!-- Testimonios -->
    <section class="testimonios bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Lo que dicen nuestros clientes</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">"Las mejores camisetas al mejor precio. ¡100% recomendado!"</p>
                            <footer class="blockquote-footer">Rogolo_05</footer>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">"Excelente calidad y atención al cliente. Volveré a comprar."</p>
                            <footer class="blockquote-footer">Kerry Kaberga</footer>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">"Envío rápido y productos auténticos. Muy contento con mi compra."</p>
                            <footer class="blockquote-footer">Illo Juan</footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
