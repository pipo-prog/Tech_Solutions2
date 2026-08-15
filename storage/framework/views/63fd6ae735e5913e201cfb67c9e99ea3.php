<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Gestión de Proyectos'); ?> - Tech Solutions</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <div class="app-container">
        <!-- Header -->
        <header>
            <div class="brand-section">
                <a href="<?php echo e(route('proyectos.index')); ?>">
                    <h1>Tech Solutions</h1>
                </a>
                <p>Plataforma de Control e Indicadores de Gestión de Proyectos</p>
            </div>
            
            <!-- Componente UF del Día -->
            <?php if (isset($component)) { $__componentOriginal75dad4efe40ada15f9f057ae8b5d86d0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal75dad4efe40ada15f9f057ae8b5d86d0 = $attributes; } ?>
<?php $component = App\View\Components\UfValue::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('uf-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\UfValue::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal75dad4efe40ada15f9f057ae8b5d86d0)): ?>
<?php $attributes = $__attributesOriginal75dad4efe40ada15f9f057ae8b5d86d0; ?>
<?php unset($__attributesOriginal75dad4efe40ada15f9f057ae8b5d86d0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal75dad4efe40ada15f9f057ae8b5d86d0)): ?>
<?php $component = $__componentOriginal75dad4efe40ada15f9f057ae8b5d86d0; ?>
<?php unset($__componentOriginal75dad4efe40ada15f9f057ae8b5d86d0); ?>
<?php endif; ?>
        </header>

        <!-- Mensajes de Éxito / Alertas -->
        <?php if(session('success')): ?>
            <div class="alert-success">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 0C4.48 0 0 4.48 0 10C0 15.52 4.48 20 10 20C15.52 20 20 15.52 20 10C20 4.48 15.52 0 10 0ZM8 15L3 10L4.41 8.59L8 12.17L15.59 4.58L17 6L8 15Z" fill="currentColor"/>
                </svg>
                <span><?php echo e(session('success')); ?></span>
            </div>
        <?php endif; ?>

        <!-- Contenido Principal -->
        <main>
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html>
<?php /**PATH C:\Users\pipe_\OneDrive\Desktop\T2-26-(50) - DESARROLLO DE SOFTWARE WEB I\gestion-proyectos\resources\views/layouts/app.blade.php ENDPATH**/ ?>