@extends('layouts.app')

@section('title', 'Daftar Laporan Banjir')

@section('content')
<div class="page-title">
    <h1>Daftar Laporan Banjir</h1>
    <p>Data laporan yang tersimpan di database LaporBanjir.</p>
</div>

<div class="laporan-grid">
    @forelse ($laporan as $data)
        @include('partials.laporan-card', ['laporan' => $data])
    @empty
        <div class="card">
            <p>Belum terdapat laporan banjir.</p>
        </div>
    @endforelse
</div>

<div style="margin-top: 24px;">
    <a href="{{ route('laporan.form') }}" class="btn">
        + Buat Laporan Baru
    </a>
</div>
@endsection
