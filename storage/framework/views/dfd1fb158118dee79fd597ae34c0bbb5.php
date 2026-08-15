<?php $__env->startSection('title', 'Detalles del Proyecto'); ?>

<?php $__env->startSection('content'); ?>
<div class="panel">
    <div class="panel-header">
        <h2 class="panel-title">Ficha del Proyecto</h2>
        <div style="display: flex; gap: 0.75rem;">
            <a href="<?php echo e(route('proyectos.index')); ?>" class="btn btn-secondary">Volver al Listado</a>
            <a href="<?php echo e(route('proyectos.edit', $proyecto->id)); ?>" class="btn btn-primary" style="background: linear-gradient(135deg, #4f46e5, var(--primary));">Editar</a>
            <a href="<?php echo e(route('proyectos.delete', $proyecto->id)); ?>" class="btn btn-danger">Eliminar</a>
        </div>
    </div>

    <!-- Dynamic Conversions and Financial KPI Banner -->
    <?php
        // Fetch current UF value from Cache (loaded by the UfValue component)
        $ufData = Illuminate\Support\Facades\Cache::get('uf_value_day');
        $ufVal = $ufData['value'] ?? 37854.29;
        $montoUf = $proyecto->monto / $ufVal;
    ?>

    <div class="detail-grid">
        <!-- Main Details -->
        <div class="detail-card">
            <h3 style="font-size: 1.6rem; font-weight: 700; margin-bottom: 1.5rem; color: #fff;">
                <?php echo e($proyecto->nombre); ?>

            </h3>

            <div class="detail-row">
                <span class="detail-label">Responsable del Proyecto</span>
                <span class="detail-value text-main"><?php echo e($proyecto->responsable); ?></span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Fecha de Inicio</span>
                <span class="detail-value text-main"><?php echo e(date('d \d\e F, Y', strtotime($proyecto->fecha_inicio))); ?></span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Estado del Proyecto</span>
                <span class="detail-value">
                    <span class="badge badge-<?php echo e(Str::slug($proyecto->estado)); ?>">
                        <?php echo e($proyecto->estado); ?>

                    </span>
                </span>
            </div>
            
            <div class="detail-row">
                <span class="detail-label">Fecha de Registro</span>
                <span class="detail-value text-muted" style="font-size: 0.85rem;"><?php echo e($proyecto->created_at->format('d/m/Y H:i')); ?></span>
            </div>
        </div>

        <!-- Financial KPI Sidebar -->
        <div class="project-summary">
            <span class="text-muted" style="font-size: 0.85rem; font-weight: 600; uppercase; letter-spacing: 0.5px;">Presupuesto Asignado</span>
            <div class="amount">$<?php echo e(number_format($proyecto->monto, 0, ',', '.')); ?> CLP</div>
            
            <div style="margin-top: 1rem; width: 100%; border-top: 1px solid rgba(255,255,255,0.08); padding-top: 1rem;">
                <span class="text-muted" style="font-size: 0.75rem; display: block; margin-bottom: 0.25rem;">Equivalencia en UF del Día</span>
                <span style="font-size: 1.25rem; font-weight: 700; color: var(--accent);">
                    <?php echo e(number_format($montoUf, 2, ',', '.')); ?> UF
                </span>
                <span style="font-size: 0.65rem; color: var(--text-muted); display: block; margin-top: 0.25rem;">
                    Calculado usando UF = $<?php echo e(number_format($ufVal, 2, ',', '.')); ?> CLP
                </span>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pipe_\OneDrive\Desktop\T2-26-(50) - DESARROLLO DE SOFTWARE WEB I\gestion-proyectos\resources\views/proyectos/show.blade.php ENDPATH**/ ?>