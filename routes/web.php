<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('post_login', [LoginController::class, 'login'])->name('post_login');
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashoard');
    Route::get(
        '/home',
        [DashboardController::class, 'home']
    )->name('home');
    Route::resource('produk', ProdukController::class);
    Route::resource('pembeli', PembeliController::class);
    Route::resource('karyawan', KaryawanController::class);
    Route::resource('pemesanan', PemesananController::class)->except('show');
    Route::put('update_pemesanan/{id}', [PemesananController::class, 'update_pemesanan'])->name('update_pemesanan');
});
Route::get('/pemesanan/{id}', [PemesananController::class, 'show'])->name('pemesanan');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
