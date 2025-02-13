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
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/aboutUs') }}">Sobre Nosotros</a>
                    </li>
                </ul>
            </div>
            <div class="search-box d-flex align-items-center">
                <input type="text" placeholder="Buscar...">
                <span>🔍</span>

            </div>

            <!-- Botón de iniciar sesión con un icono a la izquierda del carrito -->
            <a href="{{ url('/signIn') }}" class="ms-3 btn btn-outline-primary text-black border-black">
                <i class="bi bi-person-circle"></i> Registrarse
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
            <h2 class="text-center mb-4">Filtrar por Liga</h2>

            <!-- Formulario de Filtro -->
            <!-- Formulario de Filtro -->
        <form method="GET" action="{{ route('products.index') }}" class="mb-4">
            <div class="row">
                <!-- Filtro por Liga -->
                <div class="col-md-3">
                    <label for="liga">Filtrar por Liga:</label>
                    <select name="liga" id="liga" class="form-control">
                        <option value="">Todas</option>
                        @foreach ($ligas as $ligaOption)
                            <option value="{{ $ligaOption }}" {{ $ligaOption == request('liga') ? 'selected' : '' }}>
                                {{ ucfirst($ligaOption) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Filtro por Tipo -->
                <div class="col-md-3">
                    <label for="type">Filtrar por Tipo:</label>
                    <select name="type" id="type" class="form-control">
                        <option value="">Todos</option>
                        @foreach ($tipos as $tipoOption)
                            <option value="{{ $tipoOption }}" {{ $tipoOption == request('type') ? 'selected' : '' }}>
                                {{ ucfirst($tipoOption) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Filtro por Precio Mínimo -->
                <div class="col-md-3">
                    <label for="min_price">Precio Mínimo:</label>
                    <input type="number" name="min_price" id="min_price" class="form-control" step="0.01"
                        value="{{ request('min_price') }}">
                </div>

                <!-- Filtro por Precio Máximo -->
                <div class="col-md-3">
                    <label for="max_price">Precio Máximo:</label>
                    <input type="number" name="max_price" id="max_price" class="form-control" step="0.01"
                        value="{{ request('max_price') }}">
                </div>

                <!-- Botón de Filtrar -->
                <div class="col-md-12 text-center mt-3">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </form>



        <h2 class="text-center mb-4">
            {{ $liga ? 'Liga: ' . $liga : 'Todos los productos' }} 
            @if ($type) - Tipo: {{ ucfirst($type) }} @endif
        </h2>

            <div class="row">
                @foreach ($productos as $producto)
                    <div class="col-md-4 mb-4">
                        <div class="card p-5">
                            <img src="{{ asset('img/' . $producto->image) }}" class="card-img-top"
                                alt="{{ $producto->name }}">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $producto->name }}</h5>
                                <!-- Mostrar la liga debajo del nombre del producto -->
                                <p class="card-text">{{ number_format($producto->price, 2) }}€</p>
                                <div class="btn-group">
                                    <!-- Botón de más información -->
                                    <button class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#productModal{{ $producto->id }}">
                                        Más información
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Mostrar mensaje si no hay productos -->
            @if ($productos->isEmpty())
                <p class="text-center text-muted">No hay productos disponibles.</p>
            @endif
        </div>
    </section>

    <!-- Modal para mostrar más información del producto -->
    @foreach ($productos as $producto)
        <div class="modal fade" id="productModal{{ $producto->id }}" tabindex="-1"
            aria-labelledby="productModalLabel{{ $producto->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productModalLabel{{ $producto->id }}">{{ $producto->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Liga:</strong> {{ $producto->liga }}</p>
                        <p><strong>Tipo:</strong> {{ $producto->type }}</p>
                        <p><strong>Precio:</strong> {{ number_format($producto->price, 2) }}€</p>
                        <p><strong>Descripción:</strong> {{ $producto->description ?? 'No disponible' }}</p>
                        <p><strong>Imagen:</strong> <img src="{{ asset('img/' . $producto->image) }}"
                                class="img-fluid" alt="{{ $producto->name }}"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach




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
