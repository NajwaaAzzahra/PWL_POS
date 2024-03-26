


<?php $__env->startSection('subtitle', 'Kategori'); ?>
<?php $__env->startSection('content_header_title', 'Kategori'); ?>
<?php $__env->startSection('content_header_subtitle', 'Create'); ?>


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <div class="card-title">Buat kategori baru</div>
        </div>

        <form action="../kategori" method="post">
            <?php echo csrf_field(); ?> 

            <div class="card-body">
                <div class="form-group">
                    <label for="kodeKategori">Kode Kategori</label>
                    <input type="text" name="kategori_kode" id="kodeKategori" class="form-control" placeholder="Masukkan Kode Kategori">
                </div>
                <div class="form-group">
                    <label for="namaKategori">Nama Kategori</label>
                    <input type="text" name="kategori_nama" id="namaKategori" class="form-control" placeholder="Masukkan Nama Kategori">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
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
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PWL_POS\resources\views/kategori/create.blade.php ENDPATH**/ ?>