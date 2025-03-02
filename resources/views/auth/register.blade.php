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
            <h1>Regístrate para comenzar</h1>
            <p class="lead">Crea tu cuenta para acceder a todas nuestras ofertas y productos.</p>
        </div>
    </section>

    <div class="main-content">
        <div class="contact-form">
            <h2>Formulario de Registro</h2>

            <!-- 🚨 MENSAJE EN GRANDE PARA ALERTAR AL USUARIO 🚨 -->
            @if (session('success'))
                <div class="alert alert-warning text-center fw-bold fs-4" style="color: red; background-color: yellow; padding: 15px; border-radius: 10px;">
                    ¡Registro exitoso! 📩 Revisa tu correo y verifica tu cuenta antes de continuar.
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre completo</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Introduce tu nombre completo" required>
                    @if ($errors->has('name'))
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="Introduce tu email" required>
                    @if ($errors->has('email'))
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input type="text" class="form-control" id="phone" name="phone"
                        placeholder="Introduce tu teléfono" required>
                    @if ($errors->has('phone'))
                        <div class="text-danger">{{ $errors->first('phone') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Introduce tu contraseña" required>
                    @if ($errors->has('password'))
                        <div class="text-danger">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmar contraseña</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirma tu contraseña" required>
                </div>

                <!-- Nuevo campo oculto -->
                <input type="hidden" name="user_type" value="Customer">

                <p class="text-warning">Revisa tu bandeja de entrada del correo electónico. Es necesario verificar tu correo electrónico al registrarte para poder comprar en la tienda.</p>
                <button type="submit" class="btn mt-3">Registrarse</button>

            </form>

            <!-- Botón para redirigir al inicio de sesión -->
            <div class="mt-3">
                <p>¿Ya tienes una cuenta? <a href="{{ url('/login') }}" class="btn btn-link">Iniciar sesión</a></p>
            </div>
        </div>
    </div>

@endsection
