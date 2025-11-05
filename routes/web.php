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


Route::middleware(['isAdministrator'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/jenis-hewan', [App\Http\Controllers\Admin\JenisHewanController::class, 'index'])->name('admin.jenis-hewan.index');
    Route::get('/admin/pemilik', [App\Http\Controllers\Admin\PemilikController::class, 'index'])->name('admin.pemilik.index');
    Route::get('/admin/ras-hewan', [App\Http\Controllers\Admin\RasHewanController::class, 'index'])->name('admin.ras-hewan.index');
    Route::get('/admin/kategori', [App\Http\Controllers\Admin\KategoriController::class, 'index'])->name('admin.kategori.index');
    Route::get('/admin/kategori-klinis', [App\Http\Controllers\Admin\KategoriKlinisController::class, 'index'])->name('admin.kategori-klinis.index');
    Route::get('/admin/tindakan-terapi', [App\Http\Controllers\Admin\TindakanTerapiController::class, 'index'])->name('admin.tindakan-terapi.index');
    Route::get('/admin/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/role', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('admin.role.index');
    Route::get('/admin/pet', [App\Http\Controllers\Admin\PetController::class, 'index'])->name('admin.pet.index');
    Route::get('/admin/role-user', [App\Http\Controllers\Admin\RoleUserController::class, 'index'])->name('admin.role-user.index');
});

Route::middleware('isResepsionis')->group(function () {
Route::get('/resepsionis/dashboard', [App\Http\Controllers\resepsionis\DashboardController::class, 'index'])->name('resepsionis.dashboard');
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
