@extends('layouts.app')

@section('title', 'Editar Proyecto')

@section('content')
<div class="panel">
    <div class="panel-header">
        <h2 class="panel-title">Editar Proyecto</h2>
        <a href="{{ route('proyectos.show', $proyecto->id) }}" class="btn btn-secondary">Cancelar</a>
    </div>

    <form action="{{ route('proyectos.update', $proyecto->id) }}" method="POST" autocomplete="off">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre" class="form-label">Nombre del Proyecto</label>
            <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $proyecto->nombre) }}" required>
            @error('nombre')
                <span class="text-danger" style="font-size: 0.8rem; display: block; mt-1;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control @error('fecha_inicio') is-invalid @enderror" value="{{ old('fecha_inicio', $proyecto->fecha_inicio) }}" required>
                @error('fecha_inicio')
                    <span class="text-danger" style="font-size: 0.8rem; display: block; mt-1;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="estado" class="form-label">Estado del Proyecto</label>
                <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror" required>
                    <option value="Planificado" {{ old('estado', $proyecto->estado) == 'Planificado' ? 'selected' : '' }}>Planificado</option>
                    <option value="En Progreso" {{ old('estado', $proyecto->estado) == 'En Progreso' ? 'selected' : '' }}>En Progreso</option>
                    <option value="Completado" {{ old('estado', $proyecto->estado) == 'Completado' ? 'selected' : '' }}>Completado</option>
                    <option value="Suspendido" {{ old('estado', $proyecto->estado) == 'Suspendido' ? 'selected' : '' }}>Suspendido</option>
                </select>
                @error('estado')
                    <span class="text-danger" style="font-size: 0.8rem; display: block; mt-1;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label for="responsable" class="form-label">Responsable del Proyecto</label>
                <input type="text" name="responsable" id="responsable" class="form-control @error('responsable') is-invalid @enderror" value="{{ old('responsable', $proyecto->responsable) }}" required>
                @error('responsable')
                    <span class="text-danger" style="font-size: 0.8rem; display: block; mt-1;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="monto" class="form-label">Monto del Proyecto (CLP)</label>
                <input type="number" name="monto" id="monto" min="0" step="0.01" class="form-control @error('monto') is-invalid @enderror" value="{{ old('monto', $proyecto->monto) }}" required>
                @error('monto')
                    <span class="text-danger" style="font-size: 0.8rem; display: block; mt-1;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div style="display: flex; gap: 1rem; margin-top: 1.5rem;">
            <button type="submit" class="btn btn-primary">Actualizar Proyecto</button>
            <a href="{{ route('proyectos.show', $proyecto->id) }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
