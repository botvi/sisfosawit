<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    LoginController,
    RegisterController,
    KaryawanController,
    HargaBeliController,
    HargaJualController,
    PembelianController,
    PenjualanController,
    PenggajianController,
    LaporanController,
    GajiKaryawanController
};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.post');


// Rute yang dilindungi dengan middleware auth
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/karyawans', [KaryawanController::class, 'index'])->name('karyawans.index');
    Route::get('/karyawans/create', [KaryawanController::class, 'create'])->name('karyawans.create');
    Route::post('/karyawans', [KaryawanController::class, 'store'])->name('karyawans.store');
    Route::get('/karyawans/{karyawan}/edit', [KaryawanController::class, 'edit'])->name('karyawans.edit');
    Route::put('/karyawans/{karyawan}', [KaryawanController::class, 'update'])->name('karyawans.update');
    Route::delete('/karyawans/{karyawan}', [KaryawanController::class, 'destroy'])->name('karyawans.destroy');

    Route::get('/hargabeli', [HargaBeliController::class, 'index'])->name('hargabeli.index');
    Route::get('/hargabeli/create', [HargaBeliController::class, 'create'])->name('hargabeli.create');
    Route::post('/hargabeli', [HargaBeliController::class, 'store'])->name('hargabeli.store');
    Route::get('/hargabeli/{hargaBeli}/edit', [HargaBeliController::class, 'edit'])->name('hargabeli.edit');
    Route::put('/hargabeli/{hargaBeli}', [HargaBeliController::class, 'update'])->name('hargabeli.update');
    Route::delete('/hargabeli/{hargaBeli}', [HargaBeliController::class, 'destroy'])->name('hargabeli.destroy');

    Route::get('/hargajual', [HargaJualController::class, 'index'])->name('hargajual.index');
    Route::get('/hargajual/create', [HargaJualController::class, 'create'])->name('hargajual.create');
    Route::post('/hargajual', [HargaJualController::class, 'store'])->name('hargajual.store');
    Route::get('/hargajual/{hargaJual}/edit', [HargaJualController::class, 'edit'])->name('hargajual.edit');
    Route::put('/hargajual/{hargaJual}', [HargaJualController::class, 'update'])->name('hargajual.update');
    Route::delete('/hargajual/{hargaJual}', [HargaJualController::class, 'destroy'])->name('hargajual.destroy');

    Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian.index');
    Route::get('/pembelian/create', [PembelianController::class, 'create'])->name('pembelian.create');
    Route::post('/pembelian', [PembelianController::class, 'store'])->name('pembelian.store');
    Route::get('/pembelian/{pembelian}/edit', [PembelianController::class, 'edit'])->name('pembelian.edit');
    Route::put('/pembelian/{pembelian}', [PembelianController::class, 'update'])->name('pembelian.update');
    Route::delete('/pembelian/{pembelian}', [PembelianController::class, 'destroy'])->name('pembelian.destroy');

    Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
    Route::get('/penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');
    Route::post('/penjualan', [PenjualanController::class, 'store'])->name('penjualan.store');
    Route::get('/penjualan/{id}/edit', [PenjualanController::class, 'edit'])->name('penjualan.edit');
    Route::put('/penjualan/{id}', [PenjualanController::class, 'update'])->name('penjualan.update');
    Route::delete('/penjualan/{id}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');

    Route::get('/penggajian', [PenggajianController::class, 'index'])->name('penggajian.index');
    Route::post('/penggajian/cek', [PenggajianController::class, 'cekGaji'])->name('penggajian.cek');
    Route::post('/penggajian/update-status', [PenggajianController::class, 'updateStatus'])->name('penggajian.updateStatus');

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

    Route::get('/gaji_karyawan', [GajiKaryawanController::class, 'index'])->name('gaji_karyawan.index')->middleware('auth');
    Route::get('/gaji_karyawan/create', [GajiKaryawanController::class, 'create'])->name('gaji_karyawan.create')->middleware('auth');
    Route::post('/gaji_karyawan', [GajiKaryawanController::class, 'store'])->name('gaji_karyawan.store')->middleware('auth');
    Route::get('/gaji_karyawan/{gajiKaryawan}/edit', [GajiKaryawanController::class, 'edit'])->name('gaji_karyawan.edit')->middleware('auth');
    Route::put('/gaji_karyawan/{gajiKaryawan}', [GajiKaryawanController::class, 'update'])->name('gaji_karyawan.update')->middleware('auth');
    Route::delete('/gaji_karyawan/{gajiKaryawan}', [GajiKaryawanController::class, 'destroy'])->name('gaji_karyawan.destroy')->middleware('auth');
});
