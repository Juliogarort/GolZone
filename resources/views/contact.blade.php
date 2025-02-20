@extends('layouts.app')

@section('title', 'GolZone - Bienvenido')

@section('head')

    <link rel="stylesheet" href="{{ asset('css/banner.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('css/testimonios.css') }}">
@endsection

@section('content')

    <!-- Banner Principal -->
    <section class="banner">
        <div class="container text-center text-white">
            <h1>Las Mejores Camisetas de Fútbol</h1>
            <p class="lead">Encuentra las camisetas oficiales de tus equipos favoritos al mejor precio.</p>
            <a href="{{ url('/products') }}" class="btn btn-primary btn-lg">Ver Colección</a>
        </div>
    </section>

    <!-- Contenido principal (formulario centrado) -->
    <div class="main-content">
        <div class="contact-form">
            <h2>Formulario de Contacto</h2>
            <form method="POST" action="{{ route('contact.submit') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Introduce tu nombre" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Apellidos</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                        placeholder="Introduce tus apellidos" required>
                </div>
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="Introduce tu email" required>
                </div>
                <button type="submit" class="btn mt-3">Enviar</button>
            </form>
        </div>
    </div>

@endsection
