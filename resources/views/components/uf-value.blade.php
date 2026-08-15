<div class="uf-widget">
    <div class="uf-widget-body">
        <div class="uf-badge-container">
            <div class="uf-logo">UF</div>
            <div class="uf-info">
                <span class="uf-label">Valor UF del Día</span>
                <span class="uf-amount">${{ number_format($ufValue, 2, ',', '.') }} CLP</span>
            </div>
        </div>
        <div class="uf-status-container">
            <span class="uf-status-badge {{ $isReal ? 'status-real' : 'status-simulado' }}">
                {{ $isReal ? '● Servicio Activo' : '● Simulado (Fallback)' }}
            </span>
            <span class="uf-date">Ref: {{ $date }}</span>
        </div>
    </div>
</div>