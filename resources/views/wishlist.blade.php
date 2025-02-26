@extends('layouts.app')

@section('title', 'GolZone - Bienvenido')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/banner.css') }}">
@endsection

@section('content')

    <!-- Banner Principal -->
    <section class="banner">
        <div class="container text-center text-white">
            <h1>Lista de deseos</h1>
            <p class="lead">Añade tus productos favoritos a la lista de deseos.</p>
        </div>
    </section>

    <div class="container my-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($wishlistItems->isEmpty())
            <div class="text-center">
                <h2>Tu lista de deseos está vacía</h2>
                <p>¡Agrega productos que te interesen y encuéntralos fácilmente más tarde!</p>
                <a href="{{ url('/products') }}" class="btn btn-primary btn-lg">Ver Productos</a>
            </div>
        @else
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wishlistItems as $producto)
                            <tr>
                                <td>
                                    <img src="{{ asset('img/' . $producto->image) }}" alt="{{ $producto->name }}"
                                        width="70">
                                </td>
                                <td>{{ $producto->name }}</td>
                                <td>{{ number_format($producto->price, 2) }}€</td>
                                <td>
                                    <form action="{{ route('wishlist.remove', $producto->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

    </div>
@endsection
