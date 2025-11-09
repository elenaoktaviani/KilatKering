@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative bg-blue-600 text-white py-20">
  <div class="max-w-6xl mx-auto text-center">
    <h1 class="text-4xl font-bold mb-4">Layanan Laundry Cepat & Bersih</h1>
    <p class="text-lg">Pesan layanan laundry tanpa ribet, antar jemput langsung ke rumahmu.</p>
  </div>
</section>

<!-- Card Toko -->
<section class="max-w-6xl mx-auto py-12 px-4 grid md:grid-cols-3 gap-6">
  <!-- Debug slug -->
  @foreach ($tokos as $toko)
  @if($toko->slug)
  <a href="{{ route('toko.slug', $toko->slug) }}" class="bg-white rounded-xl shadow hover:shadow-lg transition p-5 block">
    @else
    <div class="bg-white rounded-xl shadow p-5 opacity-50 cursor-not-allowed">
      @endif

      @if($toko->gambar)
      <img src="{{ asset('storage/' . $toko->gambar) }}" alt="{{ $toko->nama_toko }}" class="rounded-lg mb-4">
      @else
      <img src="https://via.placeholder.com/400x200" alt="{{ $toko->nama_toko }}" class="rounded-lg mb-4">
      @endif

      <h2 class="text-xl font-semibold mb-2">{{ $toko->nama_toko }}</h2>
      <p class="text-gray-600 text-sm">{{ $toko->deskripsi ?? 'Cuci kering, cuci gosok, dan layanan lainnya.' }}</p>

      @if($toko->layanans->count())
      <ul class="mt-2 text-gray-500 text-sm">
        @foreach($toko->layanans->take(3) as $layanan)
        <li>{{ $layanan->nama_layanan }} - Rp{{ number_format($layanan->harga_per_kg, 0, ',', '.') }}/kg</li>
        @endforeach
        @if($toko->layanans->count() > 3)
        <li>+{{ $toko->layanans->count() - 3 }} layanan lainnya</li>
        @endif
      </ul>
      @endif

      @if($toko->slug)
  </a>
  @else
  </div>
  @endif
  @endforeach

</section>
@endsection