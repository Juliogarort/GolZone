@extends('layouts.app')

@section('title', 'GolZone - Contacto')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/banner.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('css/testimonios.css') }}">
@endsection

@section('content')

    <!-- Banner Principal -->
    <section class="banner">
        <div class="container text-center text-white">
            <h1>¿Necesitas ayuda? Contáctanos</h1>
            <p class="lead">Estamos aquí para resolver tus dudas.</p>
        </div>
    </section>

    <!-- Contenido principal (formulario centrado) -->
    <div class="main-content">
        <div class="contact-form">
            <h2>Formulario de Contacto</h2>

            <!-- Mensaje de éxito -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('contact.submit') }}">
                @csrf

                <!-- Nombre -->
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" 
                           placeholder="Introduce tu nombre" required minlength="3">
                </div>

                <!-- Correo electrónico -->
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email"
                           placeholder="Introduce tu email" required>
                </div>

                <!-- Teléfono -->
                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input type="tel" class="form-control" id="phone" name="phone"
                           placeholder="Introduce tu teléfono" pattern="[0-9]{9}" 
                           title="Debe ser un número de 9 dígitos" required>
                </div>

                <!-- Motivo del contacto -->
                <div class="form-group">
                    <label for="reason">Motivo de contacto</label>
                    <select class="form-control" id="reason" name="reason" required>
                        <option value="">Selecciona un motivo</option>
                        <option value="consulta">Consulta general</option>
                        <option value="soporte">Soporte técnico</option>
                        <option value="pedido">Estado de mi pedido</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>

                <!-- Mensaje -->
                <div class="form-group">
                    <label for="message">Mensaje</label>
                    <textarea class="form-control" id="message" name="message" 
                              placeholder="Escribe tu mensaje aquí..." rows="5" required></textarea>
                </div>

                <button type="submit" class="btn mt-3">Enviar</button>
            </form>
        </div>
    </div>

@endsection
