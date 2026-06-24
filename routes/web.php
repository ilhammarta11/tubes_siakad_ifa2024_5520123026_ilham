<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\KrsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'admin')->group(function () {
    Route::resource('dosen', DosenController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('matakuliah', MatakuliahController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('krs', KrsController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('jadwal-view', [JadwalController::class, 'view'])->name('jadwal.view');

    Route::get('my-krs', [KrsController::class, 'myKrs'])->name('krs.my');
    Route::post('my-krs', [KrsController::class, 'store'])->name('krs.store');
    Route::delete('my-krs/{id}', [KrsController::class, 'destroy'])->name('krs.destroy');
    Route::get('my-krs/pdf', [KrsController::class, 'exportPdf'])->name('krs.pdf');

});

require __DIR__.'/auth.php';
