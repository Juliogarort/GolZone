@extends('layouts.app')

@section('title', 'GolZone - Editar Perfil')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/banner.css') }}">
@endsection

@section('content')
    <div class="container my-5">
        <h2>Editar Perfil</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <h4>Datos personales</h4>
            <div class="form-group mb-3">
                <label for="name">Nombre</label>
                <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" class="form-control">
                @error('name')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="form-group mb-3">
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control">
                @error('email')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="form-group mb-3">
                <label for="phone">Teléfono</label>
                <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control">
                @error('phone')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <h4 class="mt-4">Dirección</h4>

            <div class="form-group mb-3">
                <label for="street">Calle</label>
                <input type="text" name="street" class="form-control" value="{{ Auth::user()->address->street ?? '' }}" required>
                @error('street')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="form-group mb-3">
                <label for="city">Ciudad</label>
                <input type="text" name="city" class="form-control" value="{{ Auth::user()->address->city ?? '' }}" required>
                @error('city')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="form-group mb-3">
                <label for="state">Provincia</label>
                <input type="text" name="state" class="form-control" value="{{ Auth::user()->address->state ?? '' }}" required>
                @error('state')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="form-group mb-3">
                <label for="postal_code">Código Postal</label>
                <input type="text" name="postal_code" class="form-control"
                    value="{{ Auth::user()->address->postal_code ?? '' }}" required>
                @error('postal_code')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="form-group mb-3">
                <label for="country">País</label>
                <input type="text" name="country" class="form-control"
                    value="{{ Auth::user()->address->country ?? '' }}" required>
                @error('country')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">Guardar cambios</button>
        </form>
    </div>
@endsection
