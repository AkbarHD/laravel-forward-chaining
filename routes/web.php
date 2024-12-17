<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengaduanController;
use Illuminate\Support\Facades\Route;





// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('admin.auth.login');
})->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::post('/pengaduan/store', [PengaduanController::class, 'store'])->name('pengaduan.store');
    Route::get('/admin/homeadmin', [HomeController::class, 'homeadmin'])->name('homeadmin');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::delete('/pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');

    // admin
    Route::get('/admin/laporan', [PengaduanController::class, 'laporan'])->name('laporan.index');
});


Route::post('/login', [LoginController::class, 'login'])->name('loginProses');
