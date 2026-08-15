<?php $__env->startSection('title', 'Eliminar Proyecto'); ?>

<?php $__env->startSection('content'); ?>
<div class="panel">
    <div class="delete-confirm-box">
        <div class="warning-icon">⚠</div>
        <h2 class="delete-title">¿Eliminar este proyecto?</h2>
        <p class="delete-subtitle">Esta acción es irreversible y removerá el registro del proyecto permanentemente de la base de datos.</p>
        
        <div class="project-info-card">
            <div class="project-name"><?php echo e($proyecto->nombre); ?></div>
            <div class="project-meta">
                <span><strong>Responsable:</strong> <?php echo e($proyecto->responsable); ?></span><br>
                <span><strong>Presupuesto:</strong> $<?php echo e(number_format($proyecto->monto, 0, ',', '.')); ?> CLP</span><br>
                <span><strong>Fecha Inicio:</strong> <?php echo e(date('d/m/Y', strtotime($proyecto->fecha_inicio))); ?></span>
            </div>
        </div>

        <form action="<?php echo e(route('proyectos.destroy', $proyecto->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            
            <div style="display: flex; gap: 1rem; justify-content: center;">
                <button type="submit" class="btn btn-danger">Eliminar Definitivamente</button>
                <a href="<?php echo e(route('proyectos.show', $proyecto->id)); ?>" class="btn btn-secondary">Cancelar y Volver</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pipe_\OneDrive\Desktop\T2-26-(50) - DESARROLLO DE SOFTWARE WEB I\Evaluacion 1\Tech_Solutions\resources\views/proyectos/delete.blade.php ENDPATH**/ ?>