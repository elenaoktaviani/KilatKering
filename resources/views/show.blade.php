@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4">
  <h1 class="text-3xl font-bold text-blue-700 mb-2">{{ $toko->nama_toko }}</h1>
  <p class="text-gray-600 mb-6">📍 {{ $toko->alamat }}</p>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
    @if($toko->gambar)
    <div class="md:col-span-1">
      <img src="{{ asset('storage/' . $toko->gambar) }}" alt="{{ $toko->nama_toko }}"
        class="rounded-xl shadow w-full max-w-xs mx-auto object-cover" />
    </div>
    @endif

    <div class="md:col-span-2 space-y-6">
      <div>
        <h2 class="text-xl font-semibold text-gray-800 mb-2">Deskripsi</h2>
        <p class="text-gray-700">{{ $toko->deskripsi ?? 'Cuci kering, cuci gosok, dan layanan lainnya.' }}</p>
      </div>

      <div>
        <h2 class="text-xl font-semibold text-gray-800 mb-2">Layanan Tersedia</h2>
        <div class="space-y-4">
          @forelse($toko->layanans as $layanan)
          <div class="bg-white rounded-lg shadow p-4">
            <h3 class="font-bold text-blue-600">{{ $layanan->nama_layanan }}</h3>
            <p class="text-sm text-gray-600">Rp{{ number_format($layanan->harga_per_kg, 0, ',', '.') }}/kg</p>
            <p class="text-sm text-gray-500">Estimasi: {{ $layanan->estimasi_hari }} hari</p>
          </div>
          @empty
          <p class="text-gray-500">Belum ada layanan terdaftar untuk toko ini.</p>
          @endforelse
        </div>
      </div>

      <div>
        <a href="{{ route('toko.pesan', ['slug' => $toko->slug]) }}"
          class="inline-block mt-4 bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-lg transition">
          Pesan Sekarang
        </a>
      </div>
    </div>
  </div>
</div>
@endsection