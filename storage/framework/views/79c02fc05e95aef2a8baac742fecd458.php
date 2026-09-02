<?php if($errors->any()): ?>
    <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
        <div class="d-flex align-items-center mb-1">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <strong>Terjadi kesalahan:</strong>
        </div>
        <ul class="mb-0 ps-3 small">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="mb-4">
    <label for="nama_jenis" class="form-label fw-semibold">Nama Jenis</label>
    <input type="text" id="nama_jenis" name="nama_jenis"
        class="form-control form-control-lg <?php $__errorArgs = ['nama_jenis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
        placeholder="Contoh: Minuman, Makanan, Snack..." value="<?php echo e(old('nama_jenis', $jenis->nama_jenis ?? '')); ?>"
        required autofocus>
    <?php $__errorArgs = ['nama_jenis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="d-flex justify-content-end gap-2 pt-2">
    <a href="<?php echo e(route('jenis.index')); ?>" class="btn btn-outline-secondary px-4">Batal</a>
    <button type="submit" class="btn btn-black px-4 fw-semibold">
        <i class="bi bi-check-lg me-1"></i> Simpan
    </button>
</div>
<?php /**PATH C:\laragon\www\apk_posbaru\resources\views/jenis/_form.blade.php ENDPATH**/ ?>