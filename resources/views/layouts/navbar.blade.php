<style>
    /* Custom Navbar Styling - Clean Monochrome (Black & White) */
    .navbar-custom {
        background: rgba(255, 255, 255, 0.9) !important;
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        border-bottom: 1px solid #e5e7eb;
        box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.03);
        padding: 0.75rem 1.5rem;
    }

    .navbar-custom .navbar-brand {
        color: #000000 !important;
        font-weight: 800;
        font-size: 1.2rem;
        letter-spacing: -0.02em;
        display: flex;
        align-items: center;
        gap: 0.6rem;
    }

    .navbar-custom .brand-icon {
        width: 36px;
        height: 36px;
        background: #ffffff;                    /* ← diubah jadi putih */
        border: 1px solid #e5e7eb;              /* garis tipis biar kelihatan */
        border-radius: 0.625rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #000000;
        font-size: 1.05rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    }

    .navbar-custom .nav-link {
        color: #4b5563 !important;
        font-weight: 500;
        font-size: 0.875rem;
        padding: 0.5rem 0.9rem !important;
        border-radius: 0.5rem;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .navbar-custom .nav-link:hover {
        color: #000000 !important;
        background: #f3f4f6;
    }

    .navbar-custom .nav-link.active {
        background: #000000 !important;
        color: #ffffff !important;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    /* Style Widget Jam Live */
    .navbar-custom .live-clock-pill {
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        padding: 0.35rem 0.85rem;
        border-radius: 50rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.825rem;
        color: #111827;
        transition: all 0.2s ease;
    }

    .navbar-custom .live-clock-pill:hover {
        border-color: #000000;
        background: #f3f4f6;
    }

    /* Profile / User Dropdown Pill */
    .navbar-custom .user-pill {
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        padding: 0.3rem 0.8rem 0.3rem 0.35rem;
        border-radius: 50rem;
        color: #111827;
        transition: all 0.2s ease;
    }

    .navbar-custom .user-pill:hover {
        border-color: #000000;
        background: #f3f4f6;
    }

    .navbar-custom .avatar-circle {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: #000000;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
        font-weight: 700;
    }

    .navbar-custom .dropdown-menu {
        background-color: #ffffff !important;
        border: 1px solid #e5e7eb !important;
        border-radius: 0.75rem;
        box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.1);
        margin-top: 0.6rem;
        padding: 0.4rem !important;
    }

    .navbar-custom .dropdown-item {
        color: #374151 !important;
        font-weight: 500;
        font-size: 0.85rem;
        padding: 0.55rem 0.9rem;
        border-radius: 0.5rem;
        transition: all 0.2s ease;
    }

    .navbar-custom .dropdown-item:hover {
        background-color: #f3f4f6 !important;
        color: #000000 !important;
    }

    .navbar-custom .dropdown-item.text-danger:hover {
        background-color: #fee2e2 !important;
        color: #dc2626 !important;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-custom sticky-top">
    <div class="container" style="max-width: 1400px;">
        {{-- LOGO --}}
        <a class="navbar-brand" href="{{ url('/dashboard') }}">
            <div class="brand-icon">
                <img src="{{ asset('images/smkn4baru.png') }}" 
                     alt="Logo Sekolah" 
                     style="width: 28px; height: 28px; object-fit: contain;">
            </div>
            <span><span style="color: #000000;">POS Adrian</span></span>
        </a>

        {{-- TOGGLER UNTUK MOBILE --}}
        <button class="navbar-toggler border-0 text-dark shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="bi bi-list fs-3"></i>
        </button>

        {{-- MENU NAVIGATION --}}
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4 gap-1">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}">
                        <i class="bi bi-grid-fill"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}"
                        href="{{ route('admin.users') }}">
                        <i class="bi bi-people-fill"></i> Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('produk*') ? 'active' : '' }}" href="{{ url('/produk') }}">
                        <i class="bi bi-box-fill"></i> Produk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('penjualan*') ? 'active' : '' }}"
                        href="{{ url('/penjualan') }}">
                        <i class="bi bi-file-earmark-bar-graph-fill"></i> Penjualan
                    </a>
                </li>
            </ul>

            {{-- JAM LIVE + USER DROPDOWN --}}
            <div class="d-flex align-items-center gap-2 mt-3 mt-lg-0">

                {{-- WIDGET JAM LIVE DIGITAL REAL-TIME --}}
                <div class="live-clock-pill">
                    <i class="bi bi-clock-history text-muted"></i>
                    <span id="nav-live-date" class="text-muted small d-none d-md-inline"></span>
                    <span id="nav-live-clock" class="fw-bold font-monospace text-dark">00:00:00 WIB</span>
                </div>

                {{-- USER DROPDOWN --}}
                <div class="dropdown">
                    <button class="btn user-pill d-flex align-items-center gap-2 dropdown-toggle border-0"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar-circle">
                            {{ strtoupper(substr(Auth::user()->name ?? 'K', 0, 1)) }}
                        </div>
                        <span class="fw-semibold small text-dark pe-1">{{ Auth::user()->name ?? 'kuda' }}</span>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">
                        @if (Route::has('profile.edit'))
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2"
                                    href="{{ route('profile.edit') }}">
                                    <i class="bi bi-person fs-6"></i> Profil
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-secondary opacity-15 my-1">
                            </li>
                        @endif
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="dropdown-item text-danger d-flex align-items-center gap-2 w-100 border-0 bg-transparent text-start">
                                    <i class="bi bi-box-arrow-right fs-6"></i> Keluar
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    function updateNavbarClock() {
        const now = new Date();

        // Format Waktu (HH:MM:SS)
        const hours   = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');

        const clockElem = document.getElementById('nav-live-clock');
        if (clockElem) {
            clockElem.innerText = `${hours}:${minutes}:${seconds} WIB`;
        }

        // Format Tanggal Indonesia (Contoh: Jum, 31 Jul)
        const options = { weekday: 'short', day: 'numeric', month: 'short' };
        const formattedDate = now.toLocaleDateString('id-ID', options);

        const dateElem = document.getElementById('nav-live-date');
        if (dateElem) {
            dateElem.innerText = formattedDate + ' •';
        }
    }

    // Jalankan pertama kali & perbarui setiap detik
    updateNavbarClock();
    setInterval(updateNavbarClock, 1000);
</script>