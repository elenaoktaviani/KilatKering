<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KilatKering</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 text-gray-900">

    <!-- Navbar -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 py-3 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">KilatKering</h1>
            <ul class="flex space-x-6 text-gray-700">
                <li><a href="/" class="hover:text-blue-600">Home</a></li>
                <li><a href="#" class="hover:text-blue-600">Tentang</a></li>
                <li><a href="#" class="hover:text-blue-600">Kontak</a></li>
                @auth
                <form action="/logout" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="cursor-pointer text-red-500 hover:underline">Logout</button>
                </form>
                @endauth

            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-100 py-6 text-center text-sm text-gray-600">
        © 2025 KilatKering. Semua Hak Dilindungi.
    </footer>

</body>

</html>