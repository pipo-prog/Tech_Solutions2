@extends('layouts.app')

@section('title', 'Eliminar Proyecto')

@section('content')
<div class="panel">
    <div class="delete-confirm-box">
        <div class="warning-icon">⚠</div>
        <h2 class="delete-title">¿Eliminar este proyecto?</h2>
        <p class="delete-subtitle">Esta acción es irreversible y removerá el registro del proyecto permanentemente de la base de datos.</p>
        
        <div class="project-info-card">
            <div class="project-name">{{ $proyecto->nombre }}</div>
            <div class="project-meta">
                <span><strong>Responsable:</strong> {{ $proyecto->responsable }}</span><br>
                <span><strong>Presupuesto:</strong> ${{ number_format($proyecto->monto, 0, ',', '.') }} CLP</span><br>
                <span><strong>Fecha Inicio:</strong> {{ date('d/m/Y', strtotime($proyecto->fecha_inicio)) }}</span>
            </div>
        </div>

        <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST">
            @csrf
            @method('DELETE')
            
            <div style="display: flex; gap: 1rem; justify-content: center;">
                <button type="submit" class="btn btn-danger">Eliminar Definitivamente</button>
                <a href="{{ route('proyectos.show', $proyecto->id) }}" class="btn btn-secondary">Cancelar y Volver</a>
            </div>
        </form>
    </div>
</div>
@endsection
