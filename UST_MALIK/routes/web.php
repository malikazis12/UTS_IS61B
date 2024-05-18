<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemeriksaanController;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Pemeriksaan Pasien
Route::middleware(['auth'])->group(function () {
    Route::get('/pemeriksaan/', [PemeriksaanController::class, 'index'])->middleware('auth');
    Route::get('/pemeriksaan/form/', [PemeriksaanController::class, 'create'])->middleware('auth');
    Route::post('/pemeriksaan/store/', [PemeriksaanController::class, 'store'])->middleware('auth');
    Route::get('/pemeriksaan/edit/{id}', [PemeriksaanController::class, 'edit'])->middleware('auth');
    Route::put('/pemeriksaan/{id}', [PemeriksaanController::class, 'update'])->middleware('auth');
    Route::delete('/pemeriksaan/{id}', [PemeriksaanController::class, 'destroy'])->middleware('auth');
});
