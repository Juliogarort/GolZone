<header>
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
</header>
