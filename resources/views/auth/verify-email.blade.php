@extends('layouts.app')

@section('title', 'Verifica tu correo - GolZone')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/banner.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')

    <!-- Banner Principal -->
    <section class="banner">
        <div class="container text-center text-white">
            <h1>Verificación de Correo Electrónico</h1>
            <p class="lead">Te hemos enviado un enlace de verificación a tu correo.</p>
        </div>
    </section>

    <div class="main-content">
        <div class="contact-form text-center">
            <h2>Confirma tu correo para continuar</h2>
            <p>Hemos enviado un correo de verificación a
                <strong>{{ Auth::user()->email ?? 'tu dirección de correo' }}</strong>.</p>
            <p>Por favor, revisa tu bandeja de entrada y haz clic en el enlace de verificación.</p>
            <p>Si no recibiste el correo, puedes solicitar uno nuevo.</p>


            @if (session('resent'))
                <div class="alert alert-success">
                    Se ha enviado un nuevo enlace de ver ificación a tu dirección de correo.
                </div>
            @endif

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn mt-3">Reenviar Correo de Verificación</button>
            </form>

            <div class="mt-3">
                <p>¿Ingresaste un correo incorrecto? <a href="{{ route('register') }}" class="btn btn-link">Regístrate de
                        nuevo</a></p>
            </div>
        </div>
    </div>

@endsection
