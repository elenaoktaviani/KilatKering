@extends('admin')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center px-4 overflow-hidden">
  <div class="w-full max-w-xl bg-white p-6 rounded-xl shadow-lg">
    <h2 class="text-3xl font-bold mb-6 text-blue-700 text-center">Tambah Pengguna</h2>

    <form action="{{ route('pengguna.store') }}" method="POST" class="space-y-5">
      @csrf

      <div>
        <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nama</label>
        <input type="text" name="name" id="name" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
      </div>

      <div>
        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
        <input type="email" name="email" id="email" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
      </div>

      <div>
        <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
        <input type="password" name="password" id="password" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
      </div>

      <div class="pt-2 flex justify-end gap-3">
        <button type="submit"
          class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg transition duration-200">
          Simpan
        </button>
        <a href="{{ route('pengguna.index') }}"
          class="text-gray-600 hover:underline font-medium text-sm">Kembali</a>
      </div>
    </form>
  </div>
</div>
@endsection