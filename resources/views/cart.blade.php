@extends('layouts.app')

@section('title', 'GolZone - Carrito')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/banner.css') }}">
@endsection

@section('content')

    <!-- Banner Principal -->
    <section class="banner">
        <div class="container text-center text-white">
            <h1>Carrito de Compras</h1>
            <p class="lead">Revisa los productos que has agregado a tu carrito.</p>
        </div>
    </section>

    <div class="container my-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($cartItems->isEmpty())
            <div class="text-center">
                <h2>El carrito está vacío</h2>
                <p>¡Agrega productos a tu carrito y comienza a comprar!</p>
                <a href="{{ url('/products') }}" class="btn btn-primary btn-lg">Ver Productos</a>
            </div>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr>
                            <td><img src="{{ asset('img/' . $item->product->image) }}" alt="{{ $item->product->name }}"
                                    width="70"></td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ number_format($item->price, 2) }}€</td>
                            <td>
                                <a href="{{ route('cart.decrease', $item->product_id) }}"
                                    class="btn btn-sm btn-secondary">-</a>
                                {{ $item->quantity }}
                                <a href="{{ route('cart.increase', $item->product_id) }}"
                                    class="btn btn-sm btn-secondary">+</a>
                            </td>
                            <td>{{ number_format($item->price * $item->quantity, 2) }}€</td>
                            <td>
                                <a href="{{ route('cart.remove', $item->product_id) }}"
                                    class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Botones adicionales -->
            <div class="d-flex justify-content-between mt-4">
                <!-- Botón de Vaciar Carrito -->
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Vaciar Carrito</button>
                </form>

                <!-- Botón de Seguir Comprando -->
                <a href="{{ url('/products') }}" class="btn btn-primary">Seguir Comprando</a>

                <!-- Botón de Ir al Pago -->
                @if (Auth::user()->address)
                    <a href="{{ route('checkout') }}" class="btn btn-success">Ir al Pago</a>
                @else
                    <button class="btn btn-warning" id="add-address">Ir al Pago</button>
                @endif

                <!-- Script para manejar la redirección si no hay dirección -->
                <script>
                    document.getElementById('add-address')?.addEventListener('click', function() {
                        alert('Debes añadir una dirección antes de proceder al pago.');
                        window.location.href = "{{ route('profile.index') }}"; // Redirige a la configuración de perfil
                    });
                </script>



            </div>

        @endif
    </div>

@endsection
