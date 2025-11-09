@extends('admin')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center px-4 overflow-hidden">
  <div class="w-full max-w-xl bg-white p-6 rounded-xl shadow-lg">
    <h2 class="text-3xl font-bold mb-6 text-blue-700 text-center">Tambah Toko Laundry</h2>

    <form action="{{ route('toko-laundry.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
      @csrf

      <div>
        <label for="nama_toko" class="block text-sm font-semibold text-gray-700 mb-1">Nama Toko</label>
        <input type="text" name="nama_toko" id="nama_toko" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
      </div>

      <div>
        <label for="alamat" class="block text-sm font-semibold text-gray-700 mb-1">Alamat</label>
        <textarea name="alamat" id="alamat" rows="3" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
          placeholder="Masukkan alamat toko"></textarea>
      </div>

      <div>
        <label for="no_hp" class="block text-sm font-semibold text-gray-700 mb-1">Nomor Telepon</label>
        <input type="text" name="no_hp" id="no_hp" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
          placeholder="Masukkan nomor telepon" />
      </div>

      <div>
        <label for="layanan" class="block text-sm font-semibold text-gray-700 mb-1">Layanan</label>
        <input type="text" name="layanan" id="layanan" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
          placeholder="Contoh: Cuci Kering, Setrika, Express" />
      </div>

      <div class="space-y-2">
        <label for="gambar" class="block text-sm font-semibold text-gray-700">Gambar Toko</label>

        <input type="file" name="gambar" id="gambar" accept="image/*"
          class="file:bg-blue-600 file:text-white file:font-semibold file:border-none file:px-4 file:py-2 file:rounded-lg
           file:cursor-pointer file:hover:bg-blue-700
           w-full text-sm text-gray-600 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
      </div>


      <div class="pt-2 flex justify-end gap-3">
        <button type="submit"
          class="cursor-pointer bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg transition duration-200">
          Simpan
        </button>
        <a href="{{ route('toko-laundry.index') }}"
          class="text-gray-600 hover:underline font-medium text-sm">Kembali</a>
      </div>
    </form>
  </div>
</div>
<script>
  document.getElementById('gambar').addEventListener('change', function(e) {
    const label = document.querySelector('label[for="gambar"]');
    const fileName = e.target.files[0]?.name || 'Gambar Toko';
    label.textContent = 'Gambar Toko: ' + fileName;
  });
</script>
@endsection