@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="panel" style="max-width: 450px; margin: 3rem auto; padding: 2.5rem 2rem;">
    <h2 class="panel-title" style="margin-bottom: 0.5rem; justify-content: center; font-size: 1.6rem;">
        Iniciar Sesión
    </h2>
    <p style="text-align: center; color: var(--text-muted); font-size: 0.9rem; margin-bottom: 2rem;">
        Ingresa tus credenciales para acceder a la plataforma
    </p>

    <!-- Error Global -->
    @error('correo')
        <div class="text-danger" style="background: rgba(239, 68, 68, 0.08); border: 1px solid rgba(239, 68, 68, 0.2); padding: 0.75rem 1rem; border-radius: 0.5rem; color: #fca5a5; font-size: 0.85rem; margin-bottom: 1.5rem; display: flex; gap: 0.5rem; align-items: center;">
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
            </svg>
            <span>{{ $message }}</span>
        </div>
    @enderror

    <form action="{{ route('login') }}" method="POST" autocomplete="off">
        @csrf

        <div class="form-group">
            <label for="correo" class="form-label">Correo Electrónico</label>
            <input type="email" name="correo" id="correo" class="form-control" value="{{ old('correo') }}" placeholder="correo@techsolutions.cl" required autofocus>
        </div>

        <div class="form-group" style="margin-bottom: 2rem;">
            <label for="clave" class="form-label">Contraseña</label>
            <input type="password" name="clave" id="clave" class="form-control" placeholder="••••••••" required>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 0.85rem;">
            Ingresar a la Plataforma
        </button>
    </form>

    <div style="margin-top: 2rem; text-align: center; border-top: 1px solid rgba(255, 255, 255, 0.05); padding-top: 1.5rem;">
        <span style="font-size: 0.9rem; color: var(--text-muted);">¿Aún no tienes cuenta?</span>
        <a href="{{ route('register') }}" style="font-size: 0.9rem; color: var(--accent); font-weight: 600; margin-left: 0.25rem; hover: text-decoration: underline;">
            Regístrate aquí
        </a>
    </div>
</div>
@endsection
