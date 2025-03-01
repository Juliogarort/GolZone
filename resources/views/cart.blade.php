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

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($cartItems->isEmpty())
            <div class="text-center">
                <h2>El carrito está vacío</h2>
                <p>¡Agrega productos a tu carrito y comienza a comprar!</p>
                <a href="{{ url('/products') }}" class="btn btn-primary btn-lg">Ver Productos</a>
            </div>
        @else
            <!-- Formulario para aplicar cupón -->
            <form action="{{ route('cart.applyDiscount') }}" method="POST" class="mb-3">
                @csrf
                <div class="input-group">
                    <input type="text" name="code" class="form-control" placeholder="Ingresa tu código de descuento">
                    <button type="submit" class="btn btn-success">Aplicar Cupón</button>
                </div>
            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Descuento</th>
                        <th>Total</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($cartItems as $item)
                        @php
                            $priceBeforeDiscount = $item->product->price;
                            $priceAfterDiscount = $item->product->discounted_price;
                            $discountApplied = $priceBeforeDiscount - $priceAfterDiscount;
                            $subtotal = $priceAfterDiscount * $item->quantity;
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td><img src="{{ asset('img/' . $item->product->image) }}" alt="{{ $item->product->name }}" width="70"></td>
                            <td>{{ $item->product->name }}</td>
                            <td>
                                @if($discountApplied > 0)
                                    <del>{{ number_format($priceBeforeDiscount, 2) }}€</del>
                                    <strong class="text-success">{{ number_format($priceAfterDiscount, 2) }}€</strong>
                                @else
                                    {{ number_format($priceBeforeDiscount, 2) }}€
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('cart.decrease', $item->product_id) }}" class="btn btn-sm btn-secondary">-</a>
                                {{ $item->quantity }}
                                <a href="{{ route('cart.increase', $item->product_id) }}" class="btn btn-sm btn-secondary">+</a>
                            </td>
                            <td>
                                @if($discountApplied > 0)
                                    -{{ number_format($discountApplied, 2) }}€
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ number_format($subtotal, 2) }}€</td>
                            <td>
                                <a href="{{ route('cart.remove', $item->product_id) }}" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Muestra el descuento aplicado -->
            @if(isset($cart->discount_code))
                <div class="alert alert-info">
                    <strong>Descuento aplicado:</strong> {{ $cart->discount_code }} (-{{ number_format($cart->discount_value, 2) }}€)
                </div>
            @endif

            <!-- Total -->
            <h4 class="text-end">Total a pagar: <strong>{{ number_format($total, 2) }}€</strong></h4>

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
            </div>

            <!-- Script para manejar la redirección si no hay dirección -->
            <script>
                document.getElementById('add-address')?.addEventListener('click', function() {
                    alert('Debes añadir una dirección antes de proceder al pago.');
                    window.location.href = "{{ route('profile.index') }}"; // Redirige a la configuración de perfil
                });
            </script>

        @endif
    </div>

@endsection
