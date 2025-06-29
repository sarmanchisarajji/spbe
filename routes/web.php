<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\AplikasiSPBEController;
use App\Http\Controllers\DomainAspekIndikatorController;


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

Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return redirect()->to('login');
    });

    // Halaman Login
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'auth'])->name('loginAuth');
});

Route::middleware(['auth'])->group(function () {
    // Halaman Dashboard
    Route::get('/dashboard', [DashboardController::class, 'indexDashboard']);

    // Halaman Domain, Aspek & Indikator
    Route::get('/aspek-indikator/domain-layanan', [DomainAspekIndikatorController::class, 'tampilAspekIndikator']);

    // Halaman Proses cobit 5
    Route::get('/Prosescobit', [AplikasiSPBEController::class, 'indexSPBE']);
    Route::post('/Prosescobit/storeAplikasi', [AplikasiSPBEController::class, 'storeAplikasi'])->name('aplikasi.store');
    Route::put('/Prosescobit/updateAplikasi/{id}', [AplikasiSPBEController::class, 'updateAplikasi'])->name('aplikasi.update');
    Route::delete('/Prosescobit/deleteAplikasi/{id}', [AplikasiSPBEController::class, 'destroyAplikasi'])->name('aplikasi.destroy');

    Route::get('/Prosescobit/{id}/indikator', [IndikatorController::class, 'indexPenilaian'])->name('penilaian.index');
    // Route::put('/Prosescobit/{idAplikasi}/penilaian/{idIndikator}/updatePenilaian', [IndikatorController::class, 'updatePenilaian'])->name('penilaian.update');
    // Route::delete('/Prosescobit/{idAplikasi}/penilaian/{idIndikator}/deletePenilaian', [IndikatorController::class, 'destroyPenilaian'])->name('penilaian.destroy');
    // Route::post('/Prosescobit/{idAplikasi}/hitungKematangan', [IndikatorController::class, 'hitungKematanganSPBE'])->name('hitung.kematangan');
    Route::get('/Prosescobit/laporanKematangan/pdf/{id}', [IndikatorController::class, 'exportPdf']);

    Route::get('/Prosescobit/{idAplikasi}/indikator/{indikator_id}/pertanyaan', [PertanyaanController::class, 'indexPertanyaan'])->name('pertanyaan.index');
    Route::put('/jawaban/{id}', [PertanyaanController::class, 'updateJawaban'])->name('jawaban.update');

    // Halaman Profile
    Route::get('/profile', [MyProfileController::class, 'indexProfile']);
    Route::post('/profile/updateProfile', [MyProfileController::class, 'updateDataProfile'])->name('dataProfile.update');
    Route::post('/profile/updateFotoProfile', [MyProfileController::class, 'updateFotoProfile'])->name('fotoProfile.update');



    // Data User
    // Halaman User
    Route::get('/data-user', [UserController::class, 'indexUser']);
    Route::post('/data-user/store-user', [UserController::class, 'storeUser'])->name('user.store');
    Route::put('/data-user/update-user/{id}', [UserController::class, 'updateUser'])->name('user.update');
    Route::delete('/data-user/delete-user/{id}', [UserController::class, 'destroyUser'])->name('user.destroy');
});
