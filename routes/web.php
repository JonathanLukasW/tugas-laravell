<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\HomeController; // BARIS INI HARUS ADA

Route::get('/', function () {
    // Tetap diarahkan ke data pegawai setelah login
    return redirect()->route('hrd.pegawai.index');
});

Route::prefix('hrd')
    ->name('hrd.')
    ->middleware('auth') 
    ->group(function () {
        Route::resource('pegawai', PegawaiController::class);
        Route::post('pegawai/{id}/restore', [PegawaiController::class, 'restore'])->name('pegawai.restore');
        Route::get('pegawai/trashed', [PegawaiController::class, 'trashed'])->name('pegawai.trashed');
    });


Auth::routes();

// ==========================================================
// KODE PROFILE YANG DIREVISI LENGKAP
// ==========================================================
Route::middleware('auth')->group(function () {
    
    // Route Tampilkan Form Edit
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    
    // Route Update Data (Nama, Telp, Alamat)
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    
    // Route Update Password
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

});
// ==========================================================


// Pertahankan route /home karena file Controller-nya ada
Route::get('/home', [HomeController::class, 'index'])->name('home');