

<?php $__env->startSection('content'); ?>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title"><?php echo e($page->title); ?></h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body"> 
        <?php if(empty($level)): ?>
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> 
                Data yang Anda cari tidak ditemukan.
            </div>
            <a href="<?php echo e(url('level')); ?>" class="btn btn-sm btn-default mt-2">Kembali</a>
        <?php else: ?>
            <form method="POST" action="<?php echo e(url('/level/'.$level->level_id)); ?>" class="form-horizontal">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?> <!-- Add this line for edit process requiring PUT method -->
                
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Kode</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="level_kode" name="level_kode" value="<?php echo e(old('level_kode', $level->level_kode)); ?>" required>
                        <?php $__errorArgs = ['level_kode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="form-text text-danger"><?php echo e($message); ?></small> 
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nama</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="level_nama" name="level_nama" value="<?php echo e(old('level_nama', $level->level_nama)); ?>" required>
                        <?php $__errorArgs = ['level_nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="form-text text-danger"><?php echo e($message); ?></small> 
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="<?php echo e(url('level')); ?>">Kembali</a>
                    </div>
                </div>
            </form> 
        <?php endif; ?>
    </div>
</div> 
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?> 
<?php $__env->stopPush(); ?> 
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PWL_POS\resources\views/level/edit.blade.php ENDPATH**/ ?>