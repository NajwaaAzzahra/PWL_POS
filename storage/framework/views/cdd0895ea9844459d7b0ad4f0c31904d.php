


<?php $__env->startSection('subtitle', 'Admin'); ?>
<?php $__env->startSection('content_header_title','Home'); ?>   
<?php $__env->startSection('content_header_subtitle','Admin'); ?>   

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            Tampilan <?php echo e(Auth::user()->level_id == 1 ? 'Admin' : 'Manager'); ?>

        </div>
        <div class="card-body">
            <h1>Login Sebagai: <?php echo e(Auth::user()->level_id == 1 ? 'Admin' : 'Manager'); ?></h1>
            <a href="<?php echo e(route('logout')); ?>">Logout</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PWL_POS\resources\views/admin.blade.php ENDPATH**/ ?>