<?php $__env->startSection('title', 'Tambah Jenis'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <style>
        .btn-black {
            background-color: #000;
            border-color: #000;
            color: #fff;
        }

        .btn-black:hover {
            background-color: #222;
            border-color: #222;
            color: #fff;
        }
    </style>

    <div class="container py-4" style="max-width: 640px;">
        <div class="mb-4">
            <h1 class="h3 fw-bold text-dark mb-1">Tambah Jenis</h1>
            <p class="text-muted small mb-0">Buat kategori / jenis produk baru</p>
        </div>

        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                <form action="<?php echo e(route('jenis.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo $__env->make('jenis._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\apk_posbaru\resources\views/jenis/create.blade.php ENDPATH**/ ?>