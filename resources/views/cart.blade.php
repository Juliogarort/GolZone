@extends('layouts.app')

@section('title', 'GolZone - Bienvenido')

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

        @if (empty($cart))
            <div class="text-center">
                <i class="fas fa-shopping-cart fa-4x"></i>
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
                    @foreach ($cart as $id => $item)
                        <tr>
                            <td><img src="{{ asset('img/' . $item['image']) }}" alt="{{ $item['name'] }}" width="70">
                            </td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ number_format($item['price'], 2) }}€</td>
                            <td>
                                <a href="{{ route('cart.decrease', $id) }}" class="btn btn-sm btn-secondary">-</a>
                                {{ $item['quantity'] }}
                                <a href="{{ route('cart.increase', $id) }}" class="btn btn-sm btn-secondary">+</a>
                            </td>
                            <td>{{ number_format($item['price'] * $item['quantity'], 2) }}€</td>
                            <td>
                                <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            <div class="text-center">
                <a href="{{ route('cart.clear') }}" class="btn btn-warning">Vaciar Carrito</a>
                <a href="{{ url('/products') }}" class="btn btn-primary">Seguir Comprando</a>
            </div>
        @endif
    </div>



@endsection
