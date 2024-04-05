

<?php $__env->startSection('content'); ?>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title"><?php echo e($page->title); ?></h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body"> 
        <?php if(empty($kategori)): ?>
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> 
                Data yang Anda cari tidak ditemukan.
            </div>
            <a href="<?php echo e(url('kategori')); ?>" class="btn btn-sm btn-default mt-2">Kembali</a>
        <?php else: ?>
            <form method="POST" action="<?php echo e(url('/kategori/'.$kategori->kategori_id)); ?>" class="form-horizontal">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?> <!-- Add this line for edit process requiring PUT method -->
                
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Kode Kategori</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="kategori_kode" name="kategori_kode" value="<?php echo e(old('kategori_kode', $kategori->kategori_kode)); ?>" required>
                        <?php $__errorArgs = ['kategori_kode'];
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
                    <label class="col-2 control-label col-form-label">Nama Kategori</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="kategori_nama" name="kategori_nama" value="<?php echo e(old('kategori_nama', $kategori->kategori_nama)); ?>" required>
                        <?php $__errorArgs = ['kategori_nama'];
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
                    <label class="col-2 control-label col-form-label"></label>
                    <div class="col-10">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="<?php echo e(url('kategori')); ?>">Kembali</a>
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

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PWL_POS\resources\views/kategori/edit.blade.php ENDPATH**/ ?>