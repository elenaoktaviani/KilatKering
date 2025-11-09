<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\TokoLaundry;
use App\Models\Layanan;
use Illuminate\Http\Request;

class PesananController extends Controller {

    public function index() {
        $pesanans = Pesanan::with(['tokoLaundry', 'layanan'])->get();
        return view('pesanan.index', compact('pesanans'));
    }

    public function create() {
        $tokos = TokoLaundry::all();
        $layanans = Layanan::all();
        return view('pesanan.create', compact('tokos', 'layanans'));
    }

    public function store(Request $request) {
        $request->validate([
            'toko_id' => 'required',
            'layanan_id' => 'required',
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'berat_kg' => 'required|numeric',
        ]);

        $layanan = Layanan::find($request->layanan_id);
        $totalHarga = $layanan->harga_per_kg * $request->berat_kg;

        Pesanan::create([
            'toko_id' => $request->toko_id,
            'layanan_id' => $request->layanan_id,
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'berat_kg' => $request->berat_kg,
            'total_harga' => $totalHarga,
            'status' => 'baru',
        ]);

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil ditambahkan!');
    }

    public function edit(Pesanan $pesanan) {
        $tokos = TokoLaundry::all();
        $layanans = Layanan::all();
        return view('pesanan.edit', compact('pesanan', 'tokos', 'layanans'));
    }

    public function update(Request $request, Pesanan $pesanan) {
        $request->validate([
            'status' => 'required',
        ]);

        $pesanan->update($request->all());
        return redirect()->route('pesanan.index')->with('success', 'Status pesanan berhasil diperbarui!');
    }

    public function show(Pesanan $pesanan) {
        return view('pesanan.show', compact('pesanan'));
    }

    public function destroy(Pesanan $pesanan) {
        $pesanan->delete();
        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus!');
    }
}
