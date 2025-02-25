<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            @if(Auth::user() && Auth::user()->email === 'admin@example.com')
                <!-- Admin: Logo sin enlace -->
                <a class="navbar-brand disabled">
                    <img src="{{ asset('img/Isotipo.png') }}" class="logo" alt="Isotipo GolZone">
                </a>
            @else
                <!-- Usuarios normales: Logo con enlace -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/Isotipo.png') }}" class="logo" alt="Isotipo GolZone">
                </a>
            @endif

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                @if(!Auth::user() || Auth::user()->email !== 'admin@example.com')
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/') }}">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/products') }}">Productos</a></li>
                        <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/contact') }}">Contacto</a></li>
                        <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/aboutUs') }}">Conócenos</a></li>
                    </ul>
                @endif
            </div>

            @auth
                <h5 class="ms-3 text-dark d-inline">
                    Bienvenido, {{ Auth::user()->name }}
                </h5>
                <a href="{{ route('logout') }}" class="ms-3 btn btn-outline-danger btn-lg text-black border-black"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ url('/login') }}" class="ms-3 btn btn-outline-primary text-black border-black">
                    <i class="bi bi-person-circle"></i> Iniciar sesión
                </a>
            @endauth

            @if(!Auth::user() || Auth::user()->email !== 'admin@example.com')
                <a href="{{ url('/cart') }}" class="ms-3 btn btn-outline-danger text-black border-black">
                    <i class="bi bi-cart-fill"></i> Carrito
                </a>
            @endif
        </div>
    </nav>
</header>
