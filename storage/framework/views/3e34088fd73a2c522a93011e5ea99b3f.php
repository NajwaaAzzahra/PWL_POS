
<?php $__env->startSection('content'); ?>
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Show User</h2>
        </div>

        <div class="float-right">
            <a class="btn btn-secondary" href="<?php echo e(route('m_user.index')); ?>">Kembali</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>User_id:</strong> 
            <?php echo e($useri->user_id); ?>

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Level_id:</strong> 
            <?php echo e($useri->level_id); ?>

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Username:</strong> 
            <?php echo e($useri->username); ?>

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama:</strong> 
            <?php echo e($useri->nama); ?>

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong> 
            <?php echo e($useri->password); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('m_user.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PWL_POS\resources\views/m_user/show.blade.php ENDPATH**/ ?>