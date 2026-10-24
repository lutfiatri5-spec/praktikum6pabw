@extends('layouts.app')

@section('title', 'Profil Petugas')

@section('content')
<div class="page-title">
    <div class="eyebrow">AKUN PETUGAS</div>
    <h1>Profil Petugas</h1>
    <p>Informasi akun yang sedang digunakan untuk mengakses sistem LaporBanjir.</p>
</div>

<section class="card profile-card">
    <div class="profile-avatar">{{ strtoupper(mb_substr($petugas->name, 0, 1)) }}</div>
    <div class="profile-info">
        <h2>{{ $petugas->name }}</h2>
        <p class="muted">Petugas BPBD Kabupaten Bandung</p>
    </div>
    <div class="profile-details">
        <div class="profile-detail">
            <span class="label">Nama Lengkap</span>
            <span>{{ $petugas->name }}</span>
        </div>
        <div class="profile-detail">
            <span class="label">Email</span>
            <span>{{ $petugas->email }}</span>
        </div>
        <div class="profile-detail">
            <span class="label">Akun Dibuat</span>
            <span>{{ $petugas->created_at ? $petugas->created_at->translatedFormat('d F Y, H:i') : '-' }}</span>
        </div>
    </div>
    <a href="{{ route('laporan.index') }}" class="btn">Kembali ke Daftar Laporan</a>
</section>
@endsection
