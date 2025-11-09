@extends('admin')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center px-4 overflow-hidden">
  <div class="w-full max-w-xl bg-white p-6 rounded-xl shadow-lg">
    <h2 class="text-3xl font-bold mb-6 text-blue-700 text-center">Edit Data Laundry</h2>

    <a href="{{ route('toko-laundry.index') }}"
      class="inline-block mb-6 text-sm text-gray-600 hover:text-blue-600 hover:underline font-medium">
      ← Kembali ke daftar toko
    </a>

    <form action="{{ route('toko-laundry.update', $toko->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
      @csrf
      @method('PUT')

      <div>
        <label for="nama_toko" class="block text-sm font-semibold text-gray-700 mb-1">Nama Toko</label>
        <input type="text" name="nama_toko" id="nama_toko" value="{{ old('nama_toko', $toko->nama_toko) }}" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
      </div>

      <div>
        <label for="alamat" class="block text-sm font-semibold text-gray-700 mb-1">Alamat</label>
        <textarea name="alamat" id="alamat" rows="3" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ old('alamat', $toko->alamat) }}</textarea>
      </div>

      <div>
        <label for="no_hp" class="block text-sm font-semibold text-gray-700 mb-1">Nomor Telepon</label>
        <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', $toko->no_hp) }}" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
      </div>

      <div>
        <label for="gambar" class="block text-sm font-semibold text-gray-700 mb-1">Gambar Toko</label>
        <input type="file" name="gambar" id="gambar" accept="image/*"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
        @if($toko->gambar)
        <p class="text-sm text-gray-500 mt-1">Gambar saat ini: <span class="text-blue-600">{{ $toko->gambar }}</span></p>
        @endif
      </div>

      <div class="pt-2 flex justify-end gap-3">
        <button type="submit"
          class="bg-blue-600 hover:bg-blue-700 text-white cursor-pointer font-semibold px-6 py-2 rounded-lg transition duration-200">
          Perbarui
        </button>
      </div>
    </form>
  </div>
</div>
@endsection