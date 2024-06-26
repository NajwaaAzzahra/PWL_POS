

<?php $__env->startSection('content'); ?>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title"><?php echo e($page->title); ?></h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body"> 
        <?php if(empty($barang)): ?>
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> 
                Data yang Anda cari tidak ditemukan.
            </div>
            <a href="<?php echo e(url('barang')); ?>" class="btn btn-sm btn-default mt-2">Kembali</a>
        <?php else: ?>
            <form method="POST" action="<?php echo e(url('/barang/'.$barang->barang_id)); ?>" class="form-horizontal">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?> <!-- Add this line for edit process requiring PUT method -->
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Kategori</label>
                    <div class="col-10">
                        <select class="form-control" id="kategori_id" name="kategori_id" required>
                            
                            <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->kategori_id); ?>" <?php if($item->kategori_id == $barang->kategori_id): ?> selected <?php endif; ?>>
                                <?php echo e($item->kategori_nama); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </select>
                        <?php $__errorArgs = ['kategori_id'];
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
                    <label class="col-2 control-label col-form-label">Kode Barang</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="barang_kode" name="barang_kode" value="<?php echo e(old('barang_kode', $barang->barang_kode)); ?>" required>
                        <?php $__errorArgs = ['barang_kode'];
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
                    <label class="col-2 control-label col-form-label">Nama Barang</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="barang_nama" name="barang_nama" value="<?php echo e(old('barang_nama', $barang->barang_nama)); ?>" required>
                        <?php $__errorArgs = ['barang_nama'];
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
                    <label class="col-2 control-label col-form-label">Harga Beli</label>
                    <div class="col-10">
                        <input type="number" class="form-control" id="harga_beli" name="harga_beli" value="<?php echo e(old('harga_beli', $barang->harga_beli)); ?>" required>
                        <?php $__errorArgs = ['harga_beli'];
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
                    <label class="col-2 control-label col-form-label">Harga Jual</label>
                    <div class="col-10">
                        <input type="number" class="form-control" id="harga_jual" name="harga_jual" value="<?php echo e(old('harga_jual', $barang->harga_jual)); ?>" required>
                        <?php $__errorArgs = ['harga_jual'];
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
                    <div class="col-9">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="<?php echo e(url('barang')); ?>">Kembali</a>
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

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PWL_POS\resources\views/barang/edit.blade.php ENDPATH**/ ?>