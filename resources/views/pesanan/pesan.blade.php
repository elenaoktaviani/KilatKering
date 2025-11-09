@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-12 px-4">
  <h2 class="text-2xl font-bold text-blue-700 mb-6">Form Pemesanan - {{ $toko->nama_toko }}</h2>

  <form action="{{ route('toko.pesan.store', $toko->slug) }}" method="POST" class="space-y-5">
    @csrf

    <div>
      <label for="nama_pelanggan" class="block text-sm font-semibold mb-1">Nama Pelanggan</label>
      <input type="text" name="nama_pelanggan" required class="w-full border px-4 py-2 rounded-lg">
    </div>

    <div>
      <label for="nomor_telepon" class="block text-sm font-semibold mb-1">Nomor HP</label>
      <input type="text" name="nomor_telepon" required class="w-full border px-4 py-2 rounded-lg">
    </div>

    <div>
      <label for="alamat" class="block text-sm font-semibold mb-1">Alamat</label>
      <input type="text" name="alamat" required class="w-full border px-4 py-2 rounded-lg">
    </div>

    <div>
      <label for="nama_layanan" class="block text-sm font-semibold mb-1">Layanan</label>
      <input type="text" name="nama_layanan" required class="w-full px-4 py-2 border rounded-lg shadow-sm">
    </div>

    <div>
      <label for="berat" class="block text-sm font-semibold mb-1">Berat (kg)</label>
      <input type="number" name="berat" step="0.1" required class="w-full border px-4 py-2 rounded-lg">
    </div>

    <button type="submit" class="cursor-pointer bg-blue-600 hover:bg-blue-800 text-white px-6 py-2 rounded-full w-full">
      Kirim Pesanan
    </button>
  </form>

</div>
@endsection