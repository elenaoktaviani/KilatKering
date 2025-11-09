<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin Dashboard')</title>
  @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-gray-100 text-gray-900 overflow-hidden">

  <div class="flex flex-col md:flex-row min-h-screen">
    <!-- Sidebar -->
    <aside class="w-full md:w-64 bg-white p-6 shadow-md">
      <h2 class="text-2xl font-bold mb-6 text-blue-700">Menu Admin</h2>
      <ul class="space-y-4 text-base font-semibold text-gray-700">
        <li class="flex items-center gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
          </svg>
          <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600">Dashboard</a>
        </li>
        <li class="flex items-center gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M5.121 17.804A4 4 0 016 16h12a4 4 0 01.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
          <a href="{{ route('pengguna.index') }}" class="hover:text-blue-600">Kelola Pengguna</a>
        </li>

        <li class="flex items-center gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16 0H4" />
          </svg>
          <a href="{{ route('toko-laundry.index') }}" class="hover:text-blue-600">Toko Laundry</a>
          <!-- </li>
        <li class="flex items-center gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6" />
          </svg>
          <a href="{{ route('layanan.index') }}" class="hover:text-blue-600">Layanan</a>
        </li> -->
          <!-- <li class="flex items-center gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 10h11M9 21V3m6 18h6" />
          </svg>
          <a href="{{ route('pesanan.index') }}" class="hover:text-blue-600">Pesanan</a>
        </li> -->

        <li class="flex items-center gap-3 pt-4 border-t border-gray-200 mt-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
          </svg>
          <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="cursor-pointer text-red-600 hover:text-red-800 font-semibold text-sm">Logout</button>
          </form>
        </li>

      </ul>
    </aside>


    <!-- Main Content -->
    <main class="flex-1 px-6 py-8">
      @section('content')
      <h1 class="text-3xl font-bold mb-6 text-blue-700">Dashboard Admin</h1>
      <p class="mb-8 text-gray-700 text-sm">Selamat datang, <strong>{{ auth()->user()->name }}</strong>!</p>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl shadow text-center">
          <h2 class="text-2xl font-bold text-blue-600">{{ \App\Models\TokoLaundry::count() }}</h2>
          <p class="text-sm text-gray-600 mt-2">Toko Laundry</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow text-center">
          <h2 class="text-2xl font-bold text-blue-600">{{ \App\Models\Layanan::count() }}</h2>
          <p class="text-sm text-gray-600 mt-2">Layanan</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow text-center">
          <h2 class="text-2xl font-bold text-blue-600">{{ \App\Models\Pesanan::count() }}</h2>
          <p class="text-sm text-gray-600 mt-2">Pesanan</p>
        </div>
      </div>
      @show
    </main>
  </div>

</body>

</html>