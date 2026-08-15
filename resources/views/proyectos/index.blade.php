@extends('layouts.app')

@section('title', 'Listado de Proyectos')

@section('content')
<div class="panel">
    <div class="panel-header">
        <h2 class="panel-title">Proyectos Registrados</h2>
        <a href="{{ route('proyectos.create') }}" class="btn btn-primary">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Nuevo Proyecto
        </a>
    </div>

    @if($proyectos->isEmpty())
        <div class="project-summary">
            <p class="text-muted">No hay proyectos registrados en el sistema.</p>
            <a href="{{ route('proyectos.create') }}" class="btn btn-primary mt-4">Crear Primer Proyecto</a>
        </div>
    @else
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Proyecto</th>
                        <th>Fecha de Inicio</th>
                        <th>Estado</th>
                        <th>Responsable</th>
                        <th>Monto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proyectos as $proyecto)
                        <tr>
                            <td>
                                <a href="{{ route('proyectos.show', $proyecto->id) }}" style="font-weight: 600; color: #fff; hover: text-decoration: underline;">
                                    {{ $proyecto->nombre }}
                                </a>
                            </td>
                            <td>{{ date('d/m/Y', strtotime($proyecto->fecha_inicio)) }}</td>
                            <td>
                                <span class="badge badge-{{ Str::slug($proyecto->estado) }}">
                                    {{ $proyecto->estado }}
                                </span>
                            </td>
                            <td>{{ $proyecto->responsable }}</td>
                            <td style="font-weight: 600;">${{ number_format($proyecto->monto, 0, ',', '.') }}</td>
                            <td>
                                <div class="actions-cell">
                                    <a href="{{ route('proyectos.show', $proyecto->id) }}" class="btn btn-secondary btn-sm" title="Ver Detalles">
                                        Ver
                                    </a>
                                    <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-secondary btn-sm" title="Editar Proyecto" style="border-color: rgba(99, 102, 241, 0.3); color: #a5b4fc;">
                                        Editar
                                    </a>
                                    <a href="{{ route('proyectos.delete', $proyecto->id) }}" class="btn btn-secondary btn-sm" title="Eliminar Proyecto" style="border-color: rgba(239, 68, 68, 0.3); color: #fca5a5;">
                                        Eliminar
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
