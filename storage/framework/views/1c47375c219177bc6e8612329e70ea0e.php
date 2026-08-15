<?php $__env->startSection('title', 'Agregar Proyecto'); ?>

<?php $__env->startSection('content'); ?>
<div class="panel">
    <div class="panel-header">
        <h2 class="panel-title">Agregar Nuevo Proyecto</h2>
        <a href="<?php echo e(route('proyectos.index')); ?>" class="btn btn-secondary">Volver al Listado</a>
    </div>

    <form action="<?php echo e(route('proyectos.store')); ?>" method="POST" autocomplete="off">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label for="nombre" class="form-label">Nombre del Proyecto</label>
            <input type="text" name="nombre" id="nombre" class="form-control <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('nombre')); ?>" placeholder="Ej: Migración ERP o Portal Clientes" required>
            <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger" style="font-size: 0.8rem; display: block; mt-1;"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control <?php $__errorArgs = ['fecha_inicio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('fecha_inicio')); ?>" required>
                <?php $__errorArgs = ['fecha_inicio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger" style="font-size: 0.8rem; display: block; mt-1;"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label for="estado" class="form-label">Estado Inicial</label>
                <select name="estado" id="estado" class="form-control <?php $__errorArgs = ['estado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                    <option value="" disabled selected>Seleccione un estado</option>
                    <option value="Planificado" <?php echo e(old('estado') == 'Planificado' ? 'selected' : ''); ?>>Planificado</option>
                    <option value="En Progreso" <?php echo e(old('estado') == 'En Progreso' ? 'selected' : ''); ?>>En Progreso</option>
                    <option value="Completado" <?php echo e(old('estado') == 'Completado' ? 'selected' : ''); ?>>Completado</option>
                    <option value="Suspendido" <?php echo e(old('estado') == 'Suspendido' ? 'selected' : ''); ?>>Suspendido</option>
                </select>
                <?php $__errorArgs = ['estado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger" style="font-size: 0.8rem; display: block; mt-1;"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label for="responsable" class="form-label">Responsable del Proyecto</label>
                <input type="text" name="responsable" id="responsable" class="form-control <?php $__errorArgs = ['responsable'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('responsable')); ?>" placeholder="Nombre del Project Manager" required>
                <?php $__errorArgs = ['responsable'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger" style="font-size: 0.8rem; display: block; mt-1;"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label for="monto" class="form-label">Monto del Proyecto (CLP)</label>
                <input type="number" name="monto" id="monto" min="0" step="0.01" class="form-control <?php $__errorArgs = ['monto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('monto')); ?>" placeholder="Ej: 5000000" required>
                <?php $__errorArgs = ['monto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger" style="font-size: 0.8rem; display: block; mt-1;"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div style="display: flex; gap: 1rem; margin-top: 1.5rem;">
            <button type="submit" class="btn btn-primary">Guardar Proyecto</button>
            <a href="<?php echo e(route('proyectos.index')); ?>" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pipe_\OneDrive\Desktop\T2-26-(50) - DESARROLLO DE SOFTWARE WEB I\Evaluacion 1\Tech_Solutions\resources\views/proyectos/create.blade.php ENDPATH**/ ?>