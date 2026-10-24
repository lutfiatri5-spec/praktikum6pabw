<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class BanjirController extends Controller
{
    // Menampilkan halaman form
    public function form()
    {
        return view('form');
    }

    // Menyimpan laporan ke database
    public function proses(Request $request)
    {
        $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tinggi_genangan' => 'required|integer|min:1|max:1000',
            'tanggal_kejadian' => 'required|date',
        ]);

        $laporan = Laporan::create([
            'nama_pelapor' => $request->nama_pelapor,
            'lokasi' => $request->lokasi,
            'tinggi_genangan' => $request->tinggi_genangan,
            'tanggal_kejadian' => $request->tanggal_kejadian,
        ]);

        return view('konfirmasi', [
            'laporan' => $laporan,
        ]);
    }

    // Menampilkan laporan dari database
    public function index()
    {
        $laporan = Laporan::all();

        return view('laporan', compact('laporan'));
    }
}
