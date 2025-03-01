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
