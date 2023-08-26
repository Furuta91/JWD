<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeasiswaController;
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

Route::get('/', [BeasiswaController::class, 'index'])->name('beasiswas.index');
Route::get('/beasiswas', [BeasiswaController::class, 'index'])->name('beasiswas.index');
Route::get('/beasiswas/detail', [BeasiswaController::class, 'detail'])->name('beasiswas.detail');
Route::get('/beasiswas/create', [BeasiswaController::class, 'create'])->name('beasiswas.create');
Route::post('/beasiswas', [BeasiswaController::class, 'store'])->name('beasiswas.store');
Route::get('/beasiswas/{beasiswa}/edit', [BeasiswaController::class, 'edit'])->name('beasiswas.edit');
Route::put('/beasiswas/{beasiswa}', [BeasiswaController::class, 'update'])->name('beasiswas.update');
Route::delete('/beasiswas/{beasiswa}', [BeasiswaController::class, 'destroy'])->name('beasiswas.destroy');
