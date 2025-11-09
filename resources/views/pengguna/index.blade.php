@extends('admin')

@section('content')
<div class="min-h-screen bg-gray-100 px-4 py-10 overflow-hidden">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold mb-6 text-blue-700">Daftar Pengguna</h2>

    <a href="{{ route('pengguna.create') }}"
      class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg mb-6 transition duration-200">
      + Tambah Pengguna
    </a>

    @if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mb-4 text-sm font-medium">
      {{ session('success') }}
    </div>
    @endif

    <div class="bg-white shadow-lg rounded-xl overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-blue-50 text-blue-700">
          <tr>
            <th class="px-6 py-3 text-left font-semibold">#</th>
            <th class="px-6 py-3 text-left font-semibold">Nama</th>
            <th class="px-6 py-3 text-left font-semibold">Email</th>
            <th class="px-6 py-3 text-left font-semibold">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @foreach($users as $user)
          <tr class="hover:bg-gray-50 transition duration-150">
            <td class="px-6 py-4">{{ $loop->iteration }}</td>
            <td class="px-6 py-4 font-medium text-gray-800">{{ $user->name }}</td>
            <td class="px-6 py-4 text-gray-600">{{ $user->email }}</td>
            <td class="px-6 py-4">
              <div class="flex gap-3">
                <a href="{{ route('pengguna.show', $user->id) }}"
                  class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 font-medium">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  Detail
                </a>
                <a href="{{ route('pengguna.edit', $user->id) }}"
                  class="inline-flex items-center gap-1 text-yellow-600 hover:text-yellow-800 font-medium">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M11 5h2m-2 14h2m-7-7h14" />
                  </svg>
                  Edit
                </a>
                <form action="{{ route('pengguna.destroy', $user->id) }}" method="POST" class="inline-block"
                  onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit"
                    class="inline-flex items-center gap-1 text-red-600 hover:text-red-800 font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Hapus
                  </button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      @if($users->isEmpty())
      <p class="p-6 text-gray-500 text-center">Belum ada pengguna.</p>
      @endif
    </div>
  </div>
</div>
@endsection