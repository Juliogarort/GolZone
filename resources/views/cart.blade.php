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

    <!-- Contenido principal (mensaje de carrito vacío) -->
    <div class="main-content">
        <div class="cart-empty text-center">
            <i class="fas fa-shopping-cart"></i>
            <h2>El carrito está vacío</h2>
            <p>¡Agrega productos a tu carrito y comienza a comprar!</p>
            <a href="{{ url('/products') }}" class="btn btn-primary btn-lg">Ver Productos</a>
        </div>
    </div>

    

@endsection
