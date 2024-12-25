<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TiketController;

Route::get('/', [TiketController::class, 'index'])->name('tikets.index');
Route::post('/pesan/{tiket}', [TiketController::class, 'pesan'])->name('tikets.pesan');

