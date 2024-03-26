


<?php $__env->startSection('subtitle', 'Level'); ?>
<?php $__env->startSection('content_header_title', 'Level'); ?>
<?php $__env->startSection('content_header_subtitle', 'Create'); ?>

<?php $__env->startSection('content'); ?>
<div class="card card-warning">
    <div class="card-header bg-primary">
        <h3 class="card-title">Tambah Level</h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <form method="POST" action="<?php echo e(route('level.tambah_simpan')); ?>">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-8">
                    
                    <div class="form-group">
                        <label>Level</label>
                        <input type="number" class="form-control" placeholder="Enter" name="level_id">
                    </div>
                    <div class="form-group">
                        <label>Level Kode</label>
                        <input type="text" class="form-control" placeholder="Enter" name="level_nama">
                    </div>
                    <div class="form-group">
                        <label>Level Nama</label>
                        <input type="text" class="form-control" placeholder="Enter" name="level_kode">
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
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PWL_POS\resources\views/level_tambah.blade.php ENDPATH**/ ?>