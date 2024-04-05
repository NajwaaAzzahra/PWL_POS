

<?php $__env->startSection('content'); ?>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title"><?php echo e($page->title); ?></h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="<?php echo e(url('penjualan/create')); ?>">Tambah</a>
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
                        <select class="form-control" id="user_id" name="user_id" required>
                            <option value="">- Semua -</option>
                            <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->user_id); ?>"><?php echo e($item->nama); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <small class="form-text text-muted">User</small>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover table-sm" id="table_penjualan">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Pembeli</th>
                    <th>Kode Penjualan</th>
                    <th>Tanggal Penjualan</th>
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
        var dataPenjualan = $('#table_penjualan').DataTable({
            serverSide: true,
            ajax: {
                "url": "<?php echo e(url('penjualan/list')); ?>",
                "dataType": "json",
                "type": "POST",
                "data": function(d) {
                    d.user_id= $('#user_id').val();
                }
            },
            columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "user.nama",
                    className: "",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "pembeli",
                    className: "",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "penjualan_kode",
                    className: "",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "penjualan_tanggal",
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

        $('#user_id').on('change', function() {
            dataPenjualan.ajax.reload();
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PWL_POS\resources\views/penjualan/index.blade.php ENDPATH**/ ?>