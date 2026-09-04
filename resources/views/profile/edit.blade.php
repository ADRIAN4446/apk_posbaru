@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')

@include('layouts.navbar')

<div class="container py-4">

    <div class="mb-4">
        <h2 class="fw-bold">Edit Profil</h2>
        <p class="text-muted">
            Perbarui informasi profil akun kamu.
        </p>
    </div>

    <div class="card shadow-sm border-0">

        <div class="card-body p-4">

            <form action="{{ route('profile.update') }}" method="POST">

                @csrf
                @method('PUT')

                {{-- NAMA --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Nama
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $user->name) }}"
                        required
                    >

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- EMAIL --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $user->email) }}"
                        required
                    >

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="d-flex gap-2">

                    <a href="{{ route('profile') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit"
                            class="btn btn-dark">
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection