<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AplikasiSPBEController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DomainAspekIndikatorController;
use App\Http\Controllers\PenilaianController;

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

// Halaman Dashboard
 Route::get('/dashboard', [DashboardController::class, 'indexDashboard']);

// Halaman Domain, Aspek & Indikator
Route::get('/aspek-indikator/domain-layanan', [DomainAspekIndikatorController::class, 'tampilAspekIndikator']);

// Halaman Proses cobit 5
Route::get('/Prosescobit', [AplikasiSPBEController::class, 'indexSPBE']);
Route::post('/Prosescobit/storeAplikasi', [AplikasiSPBEController::class, 'storeAplikasi'])->name('aplikasi.store');
Route::put('/Prosescobit/updateAplikasi/{id}', [AplikasiSPBEController::class, 'updateAplikasi'])->name('aplikasi.update');
Route::delete('/Prosescobit/deleteAplikasi/{id}', [AplikasiSPBEController::class, 'destroyAplikasi'])->name('aplikasi.destroy');

Route::get('/Prosescobit/{id}/penilaian', [PenilaianController::class, 'indexPenilaian'])->name('penilaian.index');
Route::put('/Prosescobit/{idAplikasi}/penilaian/{idIndikator}/updatePenilaian', [PenilaianController::class, 'updatePenilaian'])->name('penilaian.update');
Route::delete('/Prosescobit/{idAplikasi}/penilaian/{idIndikator}/deletePenilaian', [PenilaianController::class, 'destroyPenilaian'])->name('penilaian.destroy');
Route::post('/Prosescobit/{idAplikasi}/hitungKematangan', [PenilaianController::class, 'hitungKematanganSPBE'])->name('hitung.kematangan');
Route::get('/Prosescobit/laporanKematangan/pdf/{id}', [PenilaianController::class, 'laporanPDF']);
