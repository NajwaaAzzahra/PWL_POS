

<?php $__env->startSection('content'); ?>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title"><?php echo e($page->title); ?></h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="<?php echo e(url('level/create')); ?>">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Filter:</label>
                    <div class="col-3">
                        <select class="form-control" id="level_id" name="level_id" required>
                            <option value="">- Semua -</option>
                            <?php $__currentLoopData = $level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->level_id); ?>"><?php echo e($item->level_nama); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <small class="form-text text-muted">Level Pengguna</small>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover table-sm" id="table_level">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Level</th>
                    <th>Nama Level</th>   
                    <th>Aksi</th>            
                </tr>
            </thead>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <!-- Additional CSS -->
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
<script>
    $(document).ready(function() {
        var dataLevel = $('#table_level').DataTable({
            serverSide: true,
            ajax: {
                "url": "<?php echo e(url('level/list')); ?>",
                "dataType": "json",
                "type": "POST",
                "data": function(d) {
                    d.level_id = $('#level_id').val();
                }
            },
            columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "level_kode",
                    className: "",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "level_nama",
                    className: "",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "aksi",
                    className: "",
                    orderable: false,
                    searchable: false
                }
            ]
        });

        $('#level_id').on('change', function() {
            dataLevel.ajax.reload();
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PWL_POS\resources\views/level/index.blade.php ENDPATH**/ ?>