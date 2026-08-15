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

        <!-- Barra de Navegación de Usuario Autenticado -->
        <?php if(auth()->guard()->check()): ?>
            <div class="user-navbar" style="display: flex; justify-content: space-between; align-items: center; background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05); padding: 0.75rem 1.25rem; border-radius: 0.75rem; margin-bottom: 1.5rem; font-size: 0.9rem; backdrop-filter: var(--glass-blur);">
                <div style="display: flex; align-items: center; gap: 0.5rem; color: var(--text-muted);">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    </svg>
                    <span>Usuario: <strong style="color: #fff;"><?php echo e(Auth::user()->nombre); ?></strong></span>
                </div>
                <form action="<?php echo e(route('logout')); ?>" method="POST" style="margin: 0;">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-secondary btn-sm" style="border-color: rgba(239, 68, 68, 0.3); color: #fca5a5; background: transparent; padding: 0.35rem 0.75rem; cursor: pointer;">
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        <?php endif; ?>

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
<?php /**PATH C:\Users\pipe_\OneDrive\Desktop\T2-26-(50) - DESARROLLO DE SOFTWARE WEB I\Evaluacion 1\Tech_Solutions\resources\views/layouts/app.blade.php ENDPATH**/ ?>