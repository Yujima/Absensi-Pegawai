<?php

use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PegawaiController::class, "index"])->name('index');

Route::middleware('guest')->group(function(){
    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
    
});

Route::middleware('auth')->group(function(){
    Route::resource('pegawai', PegawaiController::class)->except(['index']);
    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
    Route::patch('pegawai/{pegawai}/kehadiran', [PegawaiController::class, 'updateKehadiran'])
    ->name('pegawai.kehadiran');
});
