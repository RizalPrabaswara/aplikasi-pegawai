<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Layout;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [Layout::class, 'home']);

Route::controller(Layout::class)->group(function () {
    Route::get('/layouts/index', 'index');
    Route::get('/layouts/home', 'home');
});

Route::controller(EmployeeController::class)->group(function () {
    Route::get('/pegawai/index', 'index');
    Route::get('/filter', 'filter');
    Route::get('/pegawai/tambah', 'create');

    Route::get('/pegawai/datasoft', 'datasoft');
    Route::get('/pegawai/restore/{id}', 'restore');
    Route::delete('/pegawai/forceDelete/{id}', 'forceDelete');

    Route::post('/pegawai/simpan', 'store');
    Route::get('/pegawai/edit/{id}', 'edit');
    Route::put('/pegawai/edit', 'update');
    Route::delete('/pegawai/hapus/{id}', 'destroy');
});
