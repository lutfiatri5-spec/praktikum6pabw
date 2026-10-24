@extends('layouts.app')

@section('title', 'Login Petugas')

@section('content')
<div class="auth-wrap">
    <section class="auth-intro">
        <div class="eyebrow">PORTAL PETUGAS BPBD</div>
        <h1>Selamat datang kembali.</h1>
        <p>Masuk untuk melihat daftar laporan banjir yang tersimpan dan mengelola informasi petugas.</p>
        <div class="auth-note">Halaman daftar laporan hanya dapat diakses setelah login.</div>
    </section>

    <section class="card auth-card">
        <h2>Login Petugas</h2>
        <p class="muted">Masukkan email dan password akun Anda.</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}"
                    placeholder="nama@email.com" autocomplete="username" required autofocus>
                @error('email') <small class="field-error">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" name="password" type="password"
                    placeholder="Masukkan password" autocomplete="current-password" required>
                @error('password') <small class="field-error">{{ $message }}</small> @enderror
            </div>

            <label class="remember-row">
                <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
                <span>Ingat saya</span>
            </label>

            <button type="submit" class="btn btn-full">Login</button>
        </form>
        <p class="auth-switch">Belum punya akun? <a href="{{ route('register') }}">Register di sini</a></p>
    </section>
</div>
@endsection
