<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokoLaundryController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\PesananPublikController;

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

/*
|--------------------------------------------------------------------------
| Public Routes (Accessible without login)
|--------------------------------------------------------------------------
*/

Route::get('/toko/{slug}', [TokoLaundryController::class, 'showBySlug'])->name('toko.slug');
Route::get('/toko/{slug}/pesan', [PesananPublikController::class, 'create'])->name('toko.pesan');
Route::post('/toko/{slug}/pesan', [PesananPublikController::class, 'store'])->name('toko.pesan.store');

/*
|--------------------------------------------------------------------------
| Redirect '/' ke login atau home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('home')
        : redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| User Routes (Login required, role: user)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/pesan', [PesananController::class, 'createUser'])->name('pesan.create');
    Route::post('/pesan', [PesananController::class, 'storeUser'])->name('pesan.store');
    Route::get('/pesanan/sukses', [PesananController::class, 'success'])->name('pesan.success');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Login required, role: admin)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin');
    })->name('admin.dashboard');

    Route::resource('pengguna', AdminUserController::class)->names([
        'index' => 'pengguna.index',
        'create' => 'pengguna.create',
        'edit' => 'pengguna.edit',
        'show' => 'pengguna.show',
    ]);

    Route::resource('toko-laundry', TokoLaundryController::class)->names([
        'index' => 'toko-laundry.index',
        'create' => 'toko-laundry.create',
        'edit' => 'toko-laundry.edit',
        'show' => 'toko-laundry.show',
    ]);

    Route::resource('layanan', LayananController::class)->names([
        'index' => 'layanan.index',
        'create' => 'layanan.create',
        'edit' => 'layanan.edit',
        'show' => 'layanan.show',
    ]);

    Route::resource('pesanan', PesananController::class)->names([
        'index' => 'pesanan.index',
        'create' => 'pesanan.create',
        'edit' => 'pesanan.edit',
        'show' => 'pesanan.show',
    ]);
});
