<div class="uf-widget">
    <div class="uf-widget-body">
        <div class="uf-badge-container">
            <div class="uf-logo">UF</div>
            <div class="uf-info">
                <span class="uf-label">Valor UF del Día</span>
                <span class="uf-amount">$<?php echo e(number_format($ufValue, 2, ',', '.')); ?> CLP</span>
            </div>
        </div>
        <div class="uf-status-container">
            <span class="uf-status-badge <?php echo e($isReal ? 'status-real' : 'status-simulado'); ?>">
                <?php echo e($isReal ? '● Servicio Activo' : '● Simulado (Fallback)'); ?>

            </span>
            <span class="uf-date">Ref: <?php echo e($date); ?></span>
        </div>
    </div>
</div><?php /**PATH C:\Users\pipe_\OneDrive\Desktop\T2-26-(50) - DESARROLLO DE SOFTWARE WEB I\gestion-proyectos\resources\views/components/uf-value.blade.php ENDPATH**/ ?>