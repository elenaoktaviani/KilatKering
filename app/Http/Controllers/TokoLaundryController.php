<?php

namespace App\Http\Controllers;

use App\Models\TokoLaundry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TokoLaundryController extends Controller {
    public function index() {
        $tokos = TokoLaundry::all();
        return view('toko-laundry.index', compact('tokos'));
    }

    public function create() {
        return view('toko-laundry.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:20',
            'layanan' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambarPath = $request->hasFile('gambar')
            ? $request->file('gambar')->store('toko', 'public')
            : null;

        TokoLaundry::create([
            'nama_toko' => $request->nama_toko,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'layanan' => $request->layanan,
            'gambar' => $gambarPath,
            'slug' => Str::slug($request->nama_toko),
        ]);

        return redirect()->route('toko-laundry.index')->with('success', 'Toko berhasil ditambahkan.');
    }


    public function show($id) {
        $toko = TokoLaundry::findOrFail($id);
        return view('toko-laundry.show', compact('toko'));
    }

    public function edit($id) {
        $toko = TokoLaundry::findOrFail($id);
        return view('toko-laundry.edit', compact('toko'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:20',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $toko = TokoLaundry::findOrFail($id);

        $gambarPath = $request->hasFile('gambar')
            ? $request->file('gambar')->store('toko', 'public')
            : $toko->gambar;

        $toko->update([
            'nama_toko' => $request->nama_toko,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
            'slug' => Str::slug($request->nama_toko),
        ]);

        return redirect()->route('toko-laundry.index')->with('success', 'Data toko berhasil diperbarui.');
    }


    public function showBySlug($slug) {
        $toko = TokoLaundry::with('layanans')->where('slug', $slug)->firstOrFail();
        return view('toko.show', compact('toko'));
    }

    public function destroy($id) {
        $toko = TokoLaundry::findOrFail($id);
        $toko->delete();
        return redirect()->route('toko-laundry.index')->with('success', 'Toko berhasil dihapus.');
    }
}
