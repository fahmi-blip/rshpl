<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', function () {
    return view('welcome');
});

route::get('/home', [SiteController::class, 'index'])->name('home');
route::get('/visi', [SiteController::class, 'visi'])->name('visi');
route::get('/struktur', [SiteController::class, 'struktur'])->name('struktur');
route::get('/layanan', [SiteController::class, 'layanan'])->name('layanan');
route::get('/login',[AuthController::class,'login'])->name('login');
route::get('/cek-koneksi',[SiteController::class,'cekKoneksi'])->name('cek-koneksi');

route::get('/admin/jenis-hewan', [App\Http\Controllers\Admin\JenisHewanController::class, 'index'])->name('admin.jenis-hewan.index');
route::get('/admin/pemilik', [App\Http\Controllers\Admin\PemilikController::class, 'index'])->name('admin.pemilik.index');
route::get('/admin/ras-hewan', [App\Http\Controllers\Admin\RasHewanController::class, 'index'])->name('admin.ras-hewan.index');
route::get('/admin/kategori', [App\Http\Controllers\Admin\KategoriController::class, 'index'])->name('admin.kategori.index');
route::get('/admin/kategori-klinis', [App\Http\Controllers\Admin\KategoriKlinisController::class, 'index'])->name('admin.kategori-klinis.index');
route::get('/admin/tindakan-terapi', [App\Http\Controllers\Admin\TindakanTerapiController::class, 'index'])->name('admin.tindakan-terapi.index');
route::get('/admin/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
route::get('/admin/role', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('admin.role.index');
route::get('/admin/pet', [App\Http\Controllers\Admin\PetController::class, 'index'])->name('admin.pet.index');
route::get('/admin/role-user', [App\Http\Controllers\Admin\RoleUserController::class, 'index'])->name('admin.role-user.index');