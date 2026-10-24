
@extends('layouts.app')

@section('title', 'Form Laporan Banjir')

@section('content')
<div class="form-layout">
    <section class="intro-panel">
        <div class="eyebrow">LAYANAN PELAPORAN</div>
        <h1>Bantu laporkan kondisi banjir.</h1>
        <p>
            Informasi dari masyarakat membantu memberikan gambaran
            kondisi banjir yang terjadi di suatu wilayah.
        </p>

        <ol>
            <li>Isi nama pelapor</li>
            <li>Masukkan lokasi kejadian</li>
            <li>Isi tinggi genangan air</li>
            <li>Isi tanggal kejadian</li>
        </ol>
    </section>

    <section class="card">
        <h2>Form Laporan</h2>
        <p>Silakan isi informasi kejadian banjir di bawah ini.</p>

        <form action="{{ route('laporan.proses') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama_pelapor">Nama Pelapor *</label>
                <input
                    type="text"
                    id="nama_pelapor"
                    name="nama_pelapor"
                    value="{{ old('nama_pelapor') }}"
                    placeholder="Masukkan nama pelapor"
                    required
                >
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi Kejadian *</label>
                <input
                    type="text"
                    id="lokasi"
                    name="lokasi"
                    value="{{ old('lokasi') }}"
                    placeholder="Kecamatan / Desa"
                    required
                >
            </div>

            <div class="form-group">
                <label for="tinggi_genangan">Tinggi Genangan Air (cm) *</label>
                <input
                    type="number"
                    id="tinggi_genangan"
                    name="tinggi_genangan"
                    value="{{ old('tinggi_genangan') }}"
                    min="1"
                    max="1000"
                    placeholder="Masukkan tinggi genangan"
                    required
                >
            </div>

            <div class="form-group">
                <label for="tanggal_kejadian">Tanggal Kejadian *</label>
                <input
                    type="date"
                    id="tanggal_kejadian"
                    name="tanggal_kejadian"
                    value="{{ old('tanggal_kejadian') }}"
                    max="{{ date('Y-m-d') }}"
                    required
                >
            </div>

            <button type="submit" class="btn">Kirim Laporan</button>
        </form>
    </section>
</div>
@endsection
