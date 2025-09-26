<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\HomeController; 

Route::get('/', function () {
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

Route::middleware('auth')->group(function () {
    
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

});
Route::get('/home', [HomeController::class, 'index'])->name('home');