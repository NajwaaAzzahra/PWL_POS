


<?php $__env->startSection('subtitle', 'Kategori'); ?>
<?php $__env->startSection('content_header_title', 'Kategori'); ?>
<?php $__env->startSection('content_header_subtitle', 'Edit'); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit kategori</h3>
            </div>

            <form  method="post" action="<?php echo e(route('/kategori/edit_simpan', $data->kategori_id)); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class='card'></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="kodeKategori">Kode Kategori</label>
                        <input type="text" class="form-control" id="kodeKategori" name="kodeKategori" value="<?php echo e($data->kategori_kode); ?>">
                    </div>
                    <div class="form-group">
                        <label for="namaKategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="namaKategori" name="namaKategori" value="<?php echo e($data->kategori_nama); ?>">
                    </div>
                </div>
                <div class="card-footer">
                    <a href="<?php echo e(route('kategori.index')); ?>" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?> 

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PWL_POS\resources\views/kategori/edit.blade.php ENDPATH**/ ?>