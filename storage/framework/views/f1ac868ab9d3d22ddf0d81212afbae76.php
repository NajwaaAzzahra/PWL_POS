
<?php $__env->startSection('content'); ?>
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Edit User</h2>
        </div>

        <div class="float-right">
            <a class="btn btn-secondary" href="<?php echo e(route('m_user.index')); ?>">Kembali</a>
        </div>
    </div>
</div>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <strong>Ops!</strong> Error <br> <br>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<form action="<?php echo e(route('m_user.update', $useri->user_id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>User_id:</strong> 
                <input type="text" name="userid" class="form-control" placeholder="Masukkan user id" value="<?php echo e($useri->user_id); ?>">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Level_id:</strong> 
                <input type="text" name="levelid" class="form-control" placeholder="Masukkan level" value="<?php echo e($useri->level_id); ?>">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username:</strong>
                <input type="text" name="username" class="form-control" placeholder="Masukkan username" value="<?php echo e($useri->username); ?>">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" value="<?php echo e($useri->nama); ?>">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" value="<?php echo e($useri->password); ?>">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('m_user.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PWL_POS\resources\views/m_user/edit.blade.php ENDPATH**/ ?>