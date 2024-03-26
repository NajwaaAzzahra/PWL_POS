
<?php $__env->startSection('content'); ?>
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Membuat Daftar User</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="<?php echo e(route('m_user.index')); ?>">Kembali</a>
        </div>
    </div>
</div>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <strong>Ops</strong> Input Gagal<br><br>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<form action="<?php echo e(route('m_user.store')); ?>" method="POST">
<?php echo csrf_field(); ?>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label>Level</label>
        <select class="form-control" name="level_id">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
        </select>
    </div>
    
    <div class="form-group">
        <strong>Username:</strong>
        <input type="text" name="username" class="form-control" placeholder="Masukkan Username">
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Nama:</strong>
        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Password:</strong>
        <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('m_user.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PWL_POS\resources\views/m_user/create.blade.php ENDPATH**/ ?>