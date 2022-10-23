<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WisataController;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('layout', function () {
//     return view('layouts.main');
// });

// Route::get('dashboard', function () {
//     return view('dashboard');
// });

Route::get('/', [DashboardController::class, 'index']);
//Meregister nama URL wisata
Route::get('wisata', [WisataController::class, 'index']);
Route::get('wisata-add', [WisataController::class, 'create']);
Route::post('wisata', [WisataController::class, 'store'])->name('wisata_store');
Route::get('/wisata{id}', [WisataController::class, 'edit']);
Route::put('/wisata/update{id}', [WisataController::class, 'update']);
Route::get('/delete{id}', [WisataController::class, 'destroy']);

//Meregister nama URL transaksi
Route::get('transaksi', [TransaksiController::class, 'index']);
Route::get('transaksi-add', [TransaksiController::class, 'create']);
Route::post('transaksi', [TransaksiController::class, 'store'])->name('transaksi_store');
Route::get('/transaksi{id}', [TransaksiController::class, 'edit']);
Route::put('/transaksi-update{id}', [TransaksiController::class, 'update']);
Route::get('/transaksi-delete{id}', [TransaksiController::class, 'destroy'])->name('hapus');