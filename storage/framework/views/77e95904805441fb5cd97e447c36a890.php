


<?php $__env->startSection('title'); ?>
    <?php echo e(config('adminlte.title')); ?> <?php if (! empty(trim($__env->yieldContent('subtitle')))): ?> | <?php echo $__env->yieldContent('subtitle'); ?> <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>

<?php $__env->startSection('content_header'); ?>
    <?php if (! empty(trim($__env->yieldContent('content_header_title')))): ?>
        <h1 class="text-muted">
            <?php echo $__env->yieldContent('content_header_title'); ?>

            <?php if (! empty(trim($__env->yieldContent('content_header_subtitle')))): ?>
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i> <?php echo $__env->yieldContent('content_header_subtitle'); ?>
                </small>
            <?php endif; ?>
        </h1>
    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php echo $__env->yieldContent('content_body'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>
    <div class="float-right">
        Version: <?php echo e(config('app.version', '1.0.0')); ?>

    </div>

    <strong>
        <a href="<?php echo e(config('app.company_url', '#')); ?>">
            <?php echo e(config('app.company_name', 'My company')); ?>

        </a>
    </strong>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->yieldPushContent('scripts'); ?>


<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />

    <style type="text/css">
        
        /*
        .card-header {
            border-bottom: none;
        }
        .card-title {
            font-weight: 600;
        }
        */
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PWL_POS_NAJWA\resources\views/layout/app.blade.php ENDPATH**/ ?>