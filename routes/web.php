<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\JenisCutiController;
use App\Http\Controllers\DataCutiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TambahAkunController;
use App\Http\Controllers\DataAkunController;

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

Route::get('pengajuan-cuti/autocomplete',[CutiController::class,'autocompleteSearch'])->name('autocomplete');
Route::middleware(['auth'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/jenis-cuti', [JenisCuti::class, 'jenis-cuti']);
    Route::resource('/jenis-cuti', JenisCutiController::class);

    Route::get('/pengajuan-cuti', [Cuti::class, 'pengajuan-cuti']);
    Route::resource('/pengajuan-cuti', CutiController::class);

    Route::get('/tambah-akun', [User::class, 'tambah-akun']);
    Route::resource('/tambah-akun', TambahAkunController::class);

    Route::get('/data-akun', [User::class, 'data-akun']);
    Route::resource('/data-akun', DataAkunController::class);

    Route::get('/data-cuti', [Cuti::class, 'data-cuti']);
    Route::get('download-pdf/{id}',[DataCutiController::class,'download'])->name('download.cuti');
    Route::post('update-status/{id}',[DataCutiController::class,'UpdateStatus'])->name('updates.cuti');
    Route::get('status/{id}',[DataCutiController::class,'status'])->name('status.cuti');
    Route::get('download-status-pdf/{id}',[DataCutiController::class,'downloadPC'])->name('download.cuti.pengajuan');
    Route::resource('/data-cuti', DataCutiController::class);

    Route::get('/ganti-password/{id}', [Profile::class, 'ganti-password']);
    Route::resource('/ganti-password', ProfileController::class);

    Route::get('/form-pengajuan', function(){
        return view('form_pengajuan_cuti');
    })->name('form-pengajuan');
});
require __DIR__.'/auth.php';
