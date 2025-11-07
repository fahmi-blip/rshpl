<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Site\SiteController;

Route::get('/', function () {
    return view('welcome');
});

route::get('/home', [SiteController::class, 'index'])->name('home');
route::get('/visi', [SiteController::class, 'visi'])->name('visi');
route::get('/struktur', [SiteController::class, 'struktur'])->name('struktur');
route::get('/layanan', [SiteController::class, 'layanan'])->name('layanan');

route::get('/cek-koneksi',[SiteController::class,'cekKoneksi'])->name('cek-koneksi');


Auth::routes();


Route::middleware(['isAdministrator'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/jenis-hewan', [App\Http\Controllers\Admin\JenisHewanController::class, 'index'])->name('jenis-hewan.index');
    Route::get('/jenis-hewan/create', [App\Http\Controllers\Admin\JenisHewanController::class, 'create'])->name('jenis-hewan.create');
    Route::post('/jenis-hewan/store', [App\Http\Controllers\Admin\JenisHewanController::class, 'store'])->name('jenis-hewan.store');
    Route::get('/pemilik', [App\Http\Controllers\Admin\PemilikController::class, 'index'])->name('pemilik.index');
    Route::get('/ras-hewan', [App\Http\Controllers\Admin\RasHewanController::class, 'index'])->name('ras-hewan.index');
    Route::get('/kategori', [App\Http\Controllers\Admin\KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori-klinis', [App\Http\Controllers\Admin\KategoriKlinisController::class, 'index'])->name('kategori-klinis.index');
    Route::get('/tindakan-terapi', [App\Http\Controllers\Admin\TindakanTerapiController::class, 'index'])->name('tindakan-terapi.index');
    Route::get('/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
    Route::get('/role', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('role.index');
    Route::get('/pet', [App\Http\Controllers\Admin\PetController::class, 'index'])->name('pet.index');
    Route::get('/role-user', [App\Http\Controllers\Admin\RoleUserController::class, 'index'])->name('role-user.index');
});

Route::middleware(['isResepsionis'])->group(function () {
    Route::get('/resepsionis/dashboard', [App\Http\Controllers\Resepsionis\DashboardController::class, 'index'])->name('resepsionis.dashboard');
    Route::get('/resepsionis/registrasi/pemilik', [App\Http\Controllers\Resepsionis\PemilikController::class, 'index'])->name('resepsionis.registrasi.pemilik');
    Route::get('/resepsionis/registrasi/pet', [App\Http\Controllers\Resepsionis\PetController::class, 'index'])->name('resepsionis.registrasi.pet');
    Route::get('/resepsionis/registrasi/temu-dokter', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'index'])->name('resepsionis.registrasi.temudokter');
});

Route::middleware('isDokter')->group(function () {
    Route::get('/dokter/dashboard', [App\Http\Controllers\Dokter\DashboardController::class, 'index'])->name('dokter.dashboard');
    Route::get('/dokter/detail-rekam-medis', [App\Http\Controllers\Dokter\DetailRekamMedisController::class, 'index'])->name('dokter.detail-rekam-medis.index');
});

Route::middleware('isPerawat')->group(function () {
    Route::get('/perawat/dashboard', [App\Http\Controllers\Perawat\DashboardController::class, 'index'])->name('perawat.dashboard');
    Route::get('/perawat/rekam-medis', [App\Http\Controllers\Perawat\RekamMedisController::class, 'index'])->name('perawat.rekam-medis.index');
});