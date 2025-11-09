@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100 px-4">
  <div class="w-full max-w-md bg-white p-6 rounded-xl shadow-lg">
    <h2 class="text-3xl font-bold mb-6 text-center text-blue-700">Masuk ke Laundry Express</h2>

    @if($errors->any())
    <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-sm">
      {{ $errors->first() }}
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
      @csrf

      <div>
        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div>
        <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
        <input type="password" name="password" id="password" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <button type="submit"
        class="w-full cursor-pointer bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition duration-200">
        Login
      </button>

      <p class="text-sm text-center text-gray-600">
        Belum punya akun?
        <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-medium">Daftar di sini</a>
      </p>
    </form>
  </div>
</div>
@endsection
