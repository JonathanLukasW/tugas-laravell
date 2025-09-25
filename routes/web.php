<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PegawaiController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
