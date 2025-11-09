@extends('admin')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center px-4 overflow-hidden">
  <div class="w-full max-w-xl bg-white p-6 rounded-xl shadow-lg">
    <h2 class="text-3xl font-bold mb-6 text-blue-700 text-center">Detail Pengguna</h2>

    <div class="space-y-4 text-sm text-gray-700">
      <div class="flex justify-between">
        <span class="font-semibold">Nama:</span>
        <span>{{ $pengguna->name }}</span>
      </div>
      <div class="flex justify-between">
        <span class="font-semibold">Email:</span>
        <span>{{ $pengguna->email }}</span>
      </div>
    </div>

    <div class="mt-8 text-center">
      <a href="{{ route('pengguna.index') }}"
        class="inline-block bg-gray-500 hover:bg-gray-600 text-white font-medium px-5 py-2 rounded-lg transition duration-200">
        Kembali
      </a>
    </div>
  </div>
</div>
@endsection
