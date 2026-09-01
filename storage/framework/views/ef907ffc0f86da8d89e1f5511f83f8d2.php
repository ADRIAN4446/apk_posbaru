<?php $__env->startSection('title', 'Detail Produk'); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <style>
        :root {
            --bg-main: #f9fafb;
            --card-bg: #ffffff;
            --card-border: #e5e7eb;
            --btn-black: #000000;
            --btn-black-hover: #1f2937;
        }

        body {
            background-color: var(--bg-main) !important;
            color: #111827 !important;
            font-family: 'Inter', 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }

        /* Animasi Masuk */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .anim-fade {
            animation: fadeUp 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        /* Card Minimalis */
        .card-monochrome {
            background: var(--card-bg) !important;
            border: 1px solid var(--card-border);
            border-radius: 0.875rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.02);
            overflow: hidden;
        }

        /* Preview Foto Produk */
        .product-img-detail {
            width: 100%;
            max-height: 320px;
            object-fit: cover;
            border-radius: 0.5rem;
            border: 1px solid #d1d5db;
        }

        .product-img-placeholder {
            width: 100%;
            height: 280px;
            background: #f3f4f6;
            color: #9ca3af;
            border-radius: 0.5rem;
            border: 1px dashed #d1d5db;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        /* Label Detail */
        .detail-label {
            font-size: 0.75rem;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.2rem;
        }

        .detail-value {
            font-size: 0.95rem;
            color: #111827;
            font-weight: 500;
        }

        /* Tombol Outline Kembali & Aksi */
        .btn-outline-mono {
            background-color: #ffffff;
            color: #374151;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-weight: 500;
            font-size: 0.85rem;
            padding: 0.6rem 1.25rem;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-outline-mono:hover {
            background-color: #f3f4f6;
            color: #000000;
            border-color: #9ca3af;
        }

        .btn-black {
            background-color: var(--btn-black);
            color: #ffffff;
            border: 1px solid var(--btn-black);
            border-radius: 0.5rem;
            font-weight: 500;
            font-size: 0.85rem;
            padding: 0.6rem 1.25rem;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-black:hover {
            background-color: var(--btn-black-hover);
            color: #ffffff;
            border-color: var(--btn-black-hover);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
    </style>

    <div class="container py-4 anim-fade" style="max-width: 900px;">

        
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-md-center pb-3 mb-4 border-bottom border-secondary border-opacity-10">
            <div>
                <h1 class="fw-bold mb-1" style="font-size: 1.5rem; letter-spacing: -0.02em; color: #111827;">
                    Detail Produk
                </h1>
                <p class="text-muted mb-0 small">Informasi lengkap mengenai spesifikasi, harga, dan stok produk.</p>
            </div>
            <div class="mt-3 mt-md-0">
                <a href="<?php echo e(route('produk.edit', $produk->id)); ?>" class="btn btn-black">
                    <i class="bi bi-pencil-fill"></i> Edit Produk
                </a>
            </div>
        </div>

        
        <div class="card card-monochrome">
            <div class="card-body p-4 p-md-5">
                <div class="row g-4 align-items-center">
                    
                    <div class="col-12 col-md-5 text-center">
                        <?php if($produk->foto): ?>
                            <img src="<?php echo e(asset('storage/' . $produk->foto)); ?>" alt="<?php echo e($produk->nama); ?>"
                                class="product-img-detail shadow-sm">
                        <?php else: ?>
                            <div class="product-img-placeholder">
                                <i class="bi bi-image fs-1 mb-2"></i>
                                <span class="small font-monospace">Tidak ada foto</span>
                            </div>
                        <?php endif; ?>
                    </div>

                    
                    <div class="col-12 col-md-7">
                        <div class="mb-3">
                            <span class="detail-label d-block">Nama Produk</span>
                            <h3 class="fw-bold text-dark mb-0" style="font-size: 1.35rem;"><?php echo e($produk->nama); ?></h3>
                        </div>

                        <div class="row mb-3">
                            <div class="col-6">
                                <span class="detail-label d-block">Pengunggah / User</span>
                                <span class="badge rounded-pill border px-2.5 py-1 mt-1"
                                    style="background: #f3f4f6; border-color: #d1d5db !important; color: #374151; font-size: 0.75rem;">
                                    <i class="bi bi-person-circle me-1"></i> <?php echo e($produk->user->name ?? 'kude'); ?>

                                </span>
                            </div>
                            <div class="col-6">
                                <span class="detail-label d-block">Stok Tersedia</span>
                                <div class="mt-1">
                                    <?php if(($produk->stok ?? 0) <= 0): ?>
                                        <span class="badge px-2.5 py-1 rounded-pill fw-bold"
                                            style="background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; font-size: 0.75rem;">Habis</span>
                                    <?php elseif(($produk->stok ?? 0) <= 5): ?>
                                        <span class="badge px-2.5 py-1 rounded-pill fw-bold"
                                            style="background: #fef3c7; color: #d97706; border: 1px solid #fde68a; font-size: 0.75rem;"><?php echo e($produk->stok); ?>

                                            Unit</span>
                                    <?php else: ?>
                                        <span class="badge px-2.5 py-1 rounded-pill fw-bold"
                                            style="background: #f3f4f6; color: #374151; border: 1px solid #d1d5db; font-size: 0.75rem;"><?php echo e($produk->stok); ?>

                                            Unit</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-6">
                                <span class="detail-label d-block">Harga Beli</span>
                                <span class="detail-value font-monospace text-muted">Rp
                                    <?php echo e(number_format($produk->harga_beli ?? 0, 0, ',', '.')); ?></span>
                            </div>
                            <div class="col-6">
                                <span class="detail-label d-block">Harga Jual</span>
                                <span class="detail-value font-monospace fw-bold text-dark">Rp
                                    <?php echo e(number_format($produk->harga_jual ?? 0, 0, ',', '.')); ?></span>
                            </div>
                        </div>

                        <?php if(!empty($produk->deskripsi)): ?>
                            <div class="mb-3">
                                <span class="detail-label d-block">Deskripsi</span>
                                <p class="text-muted small mb-0" style="line-height: 1.5;"><?php echo e($produk->deskripsi); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <hr class="my-4 border-secondary opacity-10">

                
                <div class="d-flex justify-content-between align-items-center">
                    <a href="<?php echo e(route('produk.index')); ?>" class="btn btn-outline-mono">
                        <i class="bi bi-arrow-left"></i> Kembali ke Daftar Produk
                    </a>
                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\apk_posbaru\resources\views/produk/show.blade.php ENDPATH**/ ?>