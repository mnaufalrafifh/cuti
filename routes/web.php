<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\JenisCutiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/jenis-cuti', [JenisCuti::class, 'jenis-cuti']);
    Route::resource('/jenis-cuti', JenisCutiController::class);

    Route::get('/pengajuan-cuti', [Cuti::class, 'pengajuan-cuti']);
    Route::resource('/pengajuan-cuti', CutiController::class);
});
require __DIR__.'/auth.php';
