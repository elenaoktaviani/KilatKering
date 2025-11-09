<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\TokoLaundry;
use Illuminate\Http\Request;

class LayananController extends Controller {
    public function index() {
        $layanans = Layanan::with('tokoLaundry')->get();
        return view('layanan.index', compact('layanans'));
    }

    public function create() {
        $tokos = TokoLaundry::all();
        return view('layanan.create', compact('tokos'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'harga_per_kg' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'toko_id' => 'required|exists:toko_laundries,id',
        ]);

        Layanan::create($request->all());

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function show(Layanan $layanan) {
        return view('layanan.show', compact('layanan'));
    }

    public function edit(Layanan $layanan) {
        $tokos = TokoLaundry::all();
        return view('layanan.edit', compact('layanan', 'tokos'));
    }

    public function update(Request $request, Layanan $layanan) {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'toko_id' => 'required|exists:toko_laundries,id',
        ]);

        $layanan->update($request->all());

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Layanan $layanan) {
        $layanan->delete();
        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }
}
