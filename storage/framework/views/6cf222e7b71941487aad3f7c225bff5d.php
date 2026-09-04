 

<?php $__env->startSection('content'); ?>
<div class="container py-4" style="max-width: 650px;">
    
    <div class="card border-0 shadow-sm rounded-4 p-4" style="background: #ffffff; border: 1px solid #e5e7eb !important;">
        
        
        <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
            <div class="avatar-circle-lg" style="width: 52px; height: 52px; background: #000000; color: #ffffff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; font-weight: 700;">
                <?php echo e(strtoupper(substr($user->name ?? 'U', 0, 1))); ?>

            </div>
            <div>
                <h4 class="fw-bold mb-0 text-dark">Pengaturan Profil</h4>
                <p class="text-muted small mb-0">Kelola informasi akun dan kata sandi kamu</p>
            </div>
        </div>

        
        <?php if(session('success')): ?>
            <div class="alert alert-dark border-0 rounded-3 mb-4 d-flex align-items-center gap-2" style="background: #111827; color: #ffffff;">
                <i class="bi bi-check-circle-fill text-success"></i>
                <span class="small"><?php echo e(session('success')); ?></span>
            </div>
        <?php endif; ?>

        
        <?php if($errors->any()): ?>
            <div class="alert alert-danger border-0 rounded-3 mb-4">
                <ul class="mb-0 small ps-3">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        
        <form action="<?php echo e(route('profile.update')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label class="form-label fw-semibold small text-dark">Nama Lengkap</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 text-muted" style="border-color: #e5e7eb;">
                        <i class="bi bi-person"></i>
                    </span>
                    <input type="text" name="name" class="form-control border-start-0 shadow-none" 
                        value="<?php echo e(old('name', $user->name)); ?>" required style="border-color: #e5e7eb;">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold small text-dark">Alamat Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 text-muted" style="border-color: #e5e7eb;">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email" name="email" class="form-control border-start-0 shadow-none" 
                        value="<?php echo e(old('email', $user->email)); ?>" required style="border-color: #e5e7eb;">
                </div>
            </div>

            <hr class="my-4" style="border-color: #f3f4f6;">

            <div class="mb-3">
                <label class="form-label fw-semibold small text-dark">
                    Password Baru <span class="text-muted fw-normal">(Opsional)</span>
                </label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 text-muted" style="border-color: #e5e7eb;">
                        <i class="bi bi-key"></i>
                    </span>
                    <input type="password" name="password" class="form-control border-start-0 shadow-none" 
                        placeholder="Kosongkan jika tidak ingin diubah" style="border-color: #e5e7eb;">
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold small text-dark">Konfirmasi Password Baru</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 text-muted" style="border-color: #e5e7eb;">
                        <i class="bi bi-shield-check"></i>
                    </span>
                    <input type="password" name="password_confirmation" class="form-control border-start-0 shadow-none" 
                        placeholder="Ulangi password baru" style="border-color: #e5e7eb;">
                </div>
            </div>

            
            <a href="<?php echo e(url('/dashboard')); ?>" class="btn btn-outline-secondary px-4 py-2 rounded-3 fw-semibold">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
            <button type="submit" class="btn btn-dark px-4 py-2 rounded-3 fw-semibold shadow-sm" style="background: #000000; border: none;">
                <i class="bi bi-floppy me-1"></i> Simpan Perubahan
            </button>
        </div>
        <div class="d-flex justify-content-between align-items-center gap-2 pt-2">
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\apk_posbaru\resources\views/profile/index.blade.php ENDPATH**/ ?>