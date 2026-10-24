@extends('layouts.app')

@section('title', 'Register Petugas')

@section('content')
<div class="auth-wrap">
    <section class="auth-intro">
        <div class="eyebrow">PORTAL PETUGAS BPBD</div>
        <h1>Buat akun petugas.</h1>
        <p>Daftarkan akun untuk mengakses daftar laporan banjir dan informasi profil petugas.</p>
        <div class="auth-note">Gunakan email aktif dan password minimal 8 karakter.</div>
    </section>

    <section class="card auth-card">
        <h2>Register</h2>
        <p class="muted">Lengkapi data berikut untuk membuat akun.</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}"
                    placeholder="Masukkan nama lengkap" autocomplete="name" required autofocus>
                @error('name') <small class="field-error">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}"
                    placeholder="nama@email.com" autocomplete="email" required>
                @error('email') <small class="field-error">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" name="password" type="password"
                    placeholder="Minimal 8 karakter" autocomplete="new-password" required>
                @error('password') <small class="field-error">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password"
                    placeholder="Ulangi password" autocomplete="new-password" required>
            </div>

            <button type="submit" class="btn btn-full">Buat Akun</button>
        </form>
        <p class="auth-switch">Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
    </section>
</div>
@endsection
