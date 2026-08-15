@extends('layouts.app')

@section('title', 'Registro de Usuario')

@section('content')
<div class="panel" style="max-width: 500px; margin: 3rem auto; padding: 2.5rem 2rem;">
    <h2 class="panel-title" style="margin-bottom: 0.5rem; justify-content: center; font-size: 1.6rem;">
        Registro de Usuario
    </h2>
    <p style="text-align: center; color: var(--text-muted); font-size: 0.9rem; margin-bottom: 2rem;">
        Completa el formulario para registrarte en Tech Solutions
    </p>

    <form action="{{ route('register') }}" method="POST" autocomplete="off">
        @csrf

        <div class="form-group">
            <label for="nombre" class="form-label">Nombre Completo</label>
            <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" placeholder="Ej: Camila Beltrán" required autofocus>
            @error('nombre')
                <span class="text-danger" style="font-size: 0.8rem; display: block; margin-top: 0.25rem; color: #fca5a5;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="correo" class="form-label">Correo Electrónico</label>
            <input type="email" name="correo" id="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo') }}" placeholder="correo@techsolutions.cl" required>
            @error('correo')
                <span class="text-danger" style="font-size: 0.8rem; display: block; margin-top: 0.25rem; color: #fca5a5;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label for="clave" class="form-label">Contraseña</label>
                <input type="password" name="clave" id="clave" class="form-control @error('clave') is-invalid @enderror" placeholder="Min. 6 caracteres" required>
                @error('clave')
                    <span class="text-danger" style="font-size: 0.8rem; display: block; margin-top: 0.25rem; color: #fca5a5;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="clave_confirmation" class="form-label">Confirmar Contraseña</label>
                <input type="password" name="clave_confirmation" id="clave_confirmation" class="form-control" placeholder="Repite contraseña" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 0.85rem; margin-top: 1rem;">
            Crear Cuenta y Entrar
        </button>
    </form>

    <div style="margin-top: 2rem; text-align: center; border-top: 1px solid rgba(255, 255, 255, 0.05); padding-top: 1.5rem;">
        <span style="font-size: 0.9rem; color: var(--text-muted);">¿Ya tienes una cuenta?</span>
        <a href="{{ route('login') }}" style="font-size: 0.9rem; color: var(--accent); font-weight: 600; margin-left: 0.25rem; hover: text-decoration: underline;">
            Inicia Sesión aquí
        </a>
    </div>
</div>
@endsection
