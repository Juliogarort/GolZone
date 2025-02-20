@extends('layouts.app')

@section('title', 'GolZone - Bienvenido')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/banner.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')

    <!-- Banner Principal -->
    <section class="banner">
        <div class="container text-center text-white">
            <h1>Inicia sesión para acceder</h1>
            <p class="lead">Accede a tu cuenta y disfruta de todas nuestras ofertas y productos.</p>
        </div>
    </section>

    <!-- Contenido principal (formulario de inicio de sesión centrado) -->
    <div class="main-content">
        <div class="contact-form">
            <h2>Formulario de Inicio de sesión</h2>
            <form method="POST" action="{{ url('/login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Introduce tu email" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Introduce tu contraseña" required>
                </div>
                <button type="submit" class="btn mt-3">Iniciar sesión</button>
            </form>
            <!-- Botón para redirigir al registro -->
            <div class="mt-3">
                <p>¿No tienes cuenta? <a href="{{ url('/register') }}" class="btn btn-link">Regístrate</a></p>
            </div>
        </div>
    </div>

@endsection