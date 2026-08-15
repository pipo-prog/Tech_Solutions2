@extends('layouts.app')

@section('title', 'Agregar Proyecto')

@section('content')
<div class="panel">
    <div class="panel-header">
        <h2 class="panel-title">Agregar Nuevo Proyecto</h2>
        <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Volver al Listado</a>
    </div>

    <form action="{{ route('proyectos.store') }}" method="POST" autocomplete="off">
        @csrf

        <div class="form-group">
            <label for="nombre" class="form-label">Nombre del Proyecto</label>
            <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" placeholder="Ej: Migración ERP o Portal Clientes" required>
            @error('nombre')
                <span class="text-danger" style="font-size: 0.8rem; display: block; mt-1;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control @error('fecha_inicio') is-invalid @enderror" value="{{ old('fecha_inicio') }}" required>
                @error('fecha_inicio')
                    <span class="text-danger" style="font-size: 0.8rem; display: block; mt-1;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="estado" class="form-label">Estado Inicial</label>
                <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror" required>
                    <option value="" disabled selected>Seleccione un estado</option>
                    <option value="Planificado" {{ old('estado') == 'Planificado' ? 'selected' : '' }}>Planificado</option>
                    <option value="En Progreso" {{ old('estado') == 'En Progreso' ? 'selected' : '' }}>En Progreso</option>
                    <option value="Completado" {{ old('estado') == 'Completado' ? 'selected' : '' }}>Completado</option>
                    <option value="Suspendido" {{ old('estado') == 'Suspendido' ? 'selected' : '' }}>Suspendido</option>
                </select>
                @error('estado')
                    <span class="text-danger" style="font-size: 0.8rem; display: block; mt-1;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label for="responsable" class="form-label">Responsable del Proyecto</label>
                <input type="text" name="responsable" id="responsable" class="form-control @error('responsable') is-invalid @enderror" value="{{ old('responsable') }}" placeholder="Nombre del Project Manager" required>
                @error('responsable')
                    <span class="text-danger" style="font-size: 0.8rem; display: block; mt-1;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="monto" class="form-label">Monto del Proyecto (CLP)</label>
                <input type="number" name="monto" id="monto" min="0" step="0.01" class="form-control @error('monto') is-invalid @enderror" value="{{ old('monto') }}" placeholder="Ej: 5000000" required>
                @error('monto')
                    <span class="text-danger" style="font-size: 0.8rem; display: block; mt-1;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div style="display: flex; gap: 1rem; margin-top: 1.5rem;">
            <button type="submit" class="btn btn-primary">Guardar Proyecto</button>
            <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
