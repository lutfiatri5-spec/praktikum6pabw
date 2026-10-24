<div class="laporan-card">
    <h3>{{ $laporan->nama_pelapor }}</h3>

    <div class="laporan-data">
        <span class="label">Lokasi:</span>
        {{ $laporan->lokasi }}
    </div>

    <div class="laporan-data">
        <span class="label">Tinggi Genangan:</span>
        {{ $laporan->tinggi_genangan }} cm
    </div>

    <div class="laporan-data">
        <span class="label">Tanggal Kejadian:</span>
        {{ $laporan->tanggal_kejadian->format('d-m-Y') }}
    </div>

    @if ($laporan->tinggi_genangan < 30)
        <span class="status waspada">Waspada</span>
    @elseif ($laporan->tinggi_genangan <= 70)
        <span class="status siaga">Siaga</span>
    @else
        <span class="status awas">Awas</span>
    @endif
</div>
