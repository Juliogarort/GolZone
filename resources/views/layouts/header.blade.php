<header> 
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            @if(Auth::user() && Auth::user()->email === 'admin@example.com')
                <a class="navbar-brand disabled">
                    <img src="{{ asset('img/Isotipo.png') }}" class="logo" alt="Isotipo GolZone">
                </a>
            @else
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
                    <i class="bi bi-person-fill"></i>
                </a>
            @endauth

            @if(!Auth::user() || Auth::user()->email !== 'admin@example.com')
                @auth
                    <a href="{{ route('wishlist.index') }}" class="ms-3 btn btn-outline-warning text-black border-black">
                        <i class="bi bi-heart-fill"></i>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="ms-3 btn btn-outline-warning text-black border-black">
                        <i class="bi bi-heart-fill"></i>
                    </a>
                @endauth

                <a href="{{ url('/cart') }}" class="ms-3 btn btn-outline-success text-black border-black">
                    <i class="bi bi-cart-fill"></i>
                </a>
            @endif

            @auth
                <a href="{{ route('profile.index') }}" class="ms-3 btn btn-outline-secondary text-black border-black">
                    <i class="bi bi-gear-fill"></i>
                </a>
            @else
                <a href="{{ route('login') }}" class="ms-3 btn btn-outline-secondary text-black border-black">
                    <i class="bi bi-gear-fill"></i>
                </a>
            @endauth
        </div>
    </nav>
</header>
