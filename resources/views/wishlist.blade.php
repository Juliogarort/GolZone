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
        <h2 class="text-center">Mi Lista de Deseos</h2>

        @if ($products->isEmpty())
            <p class="text-center">Tu lista de deseos está vacía.</p>
        @else
            <ul class="list-group">
                @foreach ($products as $product)
                    <li class="list-group-item d-flex justify-content-between">
                        {{ $product->name }}
                        <span>{{ number_format($product->price, 2) }}€</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
