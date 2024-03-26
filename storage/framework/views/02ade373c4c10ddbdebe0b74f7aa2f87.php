


<?php $__env->startSection('subtitle', 'Level'); ?>
<?php $__env->startSection('content_header_title', 'Home'); ?>
<?php $__env->startSection('content_header_subtitle', 'Level'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card">
            <div class="card-body"><?php echo e($dataTable->table()); ?></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo e($dataTable->scripts()); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PWL_POS\resources\views/level/index.blade.php ENDPATH**/ ?>