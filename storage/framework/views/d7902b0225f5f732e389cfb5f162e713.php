


<?php $__env->startSection('subtitle', 'User'); ?>
<?php $__env->startSection('content_header_title', 'User'); ?>
<?php $__env->startSection('content_header_subtitle', 'Create'); ?>

<?php $__env->startSection('content'); ?>
<div class="card card-warning">
    <div class="card-header bg-primary">
        <h3 class="card-title">Tambah User</h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <form method="POST" action="<?php echo e(route('user.tambah_simpan')); ?>">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-8">
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
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Enter">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PWL_POS\resources\views/user_tambah.blade.php ENDPATH**/ ?>