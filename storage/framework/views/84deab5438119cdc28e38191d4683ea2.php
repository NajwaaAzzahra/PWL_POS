<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>File Upload</title>
</head>
<body>
    <div class="container mt-3">
        <h2>File Upload</h2>
        <hr>

        <form action="<?php echo e(url('/file-upload')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            
            <div class="mb-3">
                <label for="nama_file" class="form-label">Nama File</label>
                <input type="text" class="form-control" id="nama_file" name="nama_file">
                <?php $__errorArgs = ['nama_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>   
            
            <div class="mb-3">
                <label for="berkas" class="form-label">Gambar Profile</label>
                <input type="file" class="form-control" id="berkas" name="berkas">
                <?php $__errorArgs = ['berkas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>       

            <button type="submit" class="btn btn-primary my-2">Upload</button>
        </form>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\PWL_POS\resources\views/file-upload.blade.php ENDPATH**/ ?>