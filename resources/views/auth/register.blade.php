@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center overflow-hidden">
  <div class="w-full max-w-md bg-white p-6 rounded-xl shadow-lg">
    <h2 class="text-3xl font-bold mb-6 text-center text-blue-700">Daftar Akun Laundry Express</h2>

    @if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">
      {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
      @csrf

      <div>
        <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nama</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
        @error('name') <small class="text-red-500">{{ $message }}</small> @enderror
      </div>

      <div>
        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
        @error('email') <small class="text-red-500">{{ $message }}</small> @enderror
      </div>

      <div>
        <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
        <input type="password" name="password" id="password" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
        @error('password') <small class="text-red-500">{{ $message }}</small> @enderror
      </div>

      <div>
        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <button type="submit"
        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition duration-200">
        Register
      </button>

      <p class="text-sm text-center text-gray-600">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-medium">Login di sini</a>
      </p>
    </form>
  </div>
</div>
@endsection
