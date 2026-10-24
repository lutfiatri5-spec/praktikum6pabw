@extends('layouts.app')

@section('title', 'Konfirmasi Laporan')

@section('content')
<div class="page-title">
    <h1>Konfirmasi Laporan</h1>
    <p>Berikut data laporan banjir yang berhasil disimpan.</p>
</div>

<x-alert>
    Laporan berhasil disimpan ke database!
</x-alert>

<div class="card">
    <div class="laporan-data">
        <span class="label">Nama Pelapor:</span>
        {{ $laporan->nama_pelapor }}
    </div>

    <div class="laporan-data">
        <span class="label">Lokasi Kejadian:</span>
        {{ $laporan->lokasi }}
    </div>

    <div class="laporan-data">
        <span class="label">Tinggi Genangan:</span>
        {{ $laporan->tinggi_genangan }} cm
    </div>

    <div class="laporan-data">
        <span class="label">Tanggal Kejadian:</span>
        {{ $laporan->tanggal_kejadian }}
    </div>

    <br>

    <a href="{{ route('laporan.form') }}" class="btn">
        Buat Laporan Baru
    </a>

    <a href="{{ route('laporan.index') }}" class="btn">
        Lihat Daftar Laporan
    </a>
</div>
@endsection
