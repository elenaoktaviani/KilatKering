<?php

namespace App\Http\Controllers;

use App\Models\TokoLaundry;
use App\Models\Layanan;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananPublikController extends Controller {
    public function create($slug) {
        $toko = TokoLaundry::with('layanans')->where('slug', $slug)->firstOrFail();
        return view('pesanan.pesan', compact('toko'));
    }

    public function store(Request $request, $slug) {
        $toko = TokoLaundry::where('slug', $slug)->firstOrFail();

        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'nama_layanan' => 'required|string|max:255',
            'berat' => 'required|numeric|min:0.1',
        ]);

        Pesanan::create([
            'toko_id' => $toko->id,
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_telepon' => $request->nomor_telepon,
            'alamat' => $request->alamat,
            'tanggal_pesanan' => now(),
            'total_harga' => 0, // bisa dihitung nanti
            'status' => 'menunggu',
            'nama_layanan' => $request->nama_layanan,
        ]);

        return redirect()->route('home');
    }
}
