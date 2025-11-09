@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-8">
  <img src="{{ asset('storage/'.$toko->gambar) }}" class="rounded-lg w-full h-64 object-cover mb-6" alt="{{ $toko->nama_toko }}">

  <h1 class="text-3xl font-bold mb-2">{{ $toko->nama_toko }}</h1>
  <p class="text-gray-600 mb-4">{{ $toko->alamat }}</p>
  <p class="text-gray-600 mb-6">📞 {{ $toko->no_hp }}</p>

  <h2 class="text-2xl font-semibold mb-3">Daftar Layanan</h2>
  <div class="grid md:grid-cols-2 gap-4">
    @foreach($toko->layanans as $layanan)
    <div class="border p-4 rounded-lg bg-white shadow">
      <h3 class="font-bold text-lg">{{ $layanan->nama_layanan }}</h3>
      <p>Rp{{ number_format($layanan->harga_per_kg, 0, ',', '.') }}/kg</p>
      <p class="text-sm text-gray-500">Estimasi {{ $layanan->estimasi_hari }} hari</p>
    </div>
    @endforeach
  </div>

  <div class="text-center mt-8">
    <button id="btnPesan" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Pesan Sekarang</button>
  </div>
</div>

{{-- Modal Form Pemesanan --}}
<div id="modalPesan" class="hidden fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center">
  <div class="bg-white p-6 rounded-xl shadow-lg w-96">
    <h3 class="text-xl font-semibold mb-4">Form Pemesanan</h3>
    <form method="POST" action="{{ route('pesanan.store') }}">
      @csrf
      <input type="hidden" name="toko_id" value="{{ $toko->id }}">

      <div class="mb-3">
        <label class="block mb-1 text-sm font-medium">Nama Pelanggan</label>
        <input type="text" name="nama_pelanggan" class="w-full border rounded p-2" required>
      </div>
      <div class="mb-3">
        <label class="block mb-1 text-sm font-medium">Alamat</label>
        <input type="text" name="alamat" class="w-full border rounded p-2" required>
      </div>
      <div class="mb-3">
        <label class="block mb-1 text-sm font-medium">No HP</label>
        <input type="text" name="no_hp" class="w-full border rounded p-2" required>
      </div>
      <div class="mb-3">
        <label class="block mb-1 text-sm font-medium">Pilih Layanan</label>
        <select name="layanan_id" class="w-full border rounded p-2" required>
          @foreach($toko->layanans as $layanan)
          <option value="{{ $layanan->id }}">{{ $layanan->nama_layanan }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label class="block mb-1 text-sm font-medium">Berat Cucian (kg)</label>
        <input type="number" name="berat_kg" step="0.1" class="w-full border rounded p-2" required>
      </div>
      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Kirim Pesanan</button>
      <button type="button" id="closeModal" class="w-full mt-2 border py-2 rounded hover:bg-gray-100">Batal</button>
    </form>
  </div>
</div>

<script>
  document.getElementById('btnPesan').onclick = () => {
    document.getElementById('modalPesan').classList.remove('hidden');
  };
  document.getElementById('closeModal').onclick = () => {
    document.getElementById('modalPesan').classList.add('hidden');
  };
</script>
@endsection