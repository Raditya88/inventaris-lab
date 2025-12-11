<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('inventaris', InventarisController::class);

Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::post('/peminjaman/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');

//Admin approval
Route::get('/peminjaman/approve/{id}', [PeminjamanController::class, 'approve'])->name('peminjaman.approve');
Route::get('/peminjaman/reject/{id}', [PeminjamanController::class, 'reject'])->name('peminjaman.reject');

//Login
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

//Admin Only
Route::middleware('admin')->group(function () {

    // admin menu
    Route::get('/dashboard', function() {
        return view('dashboard'); // nanti kita buat
    });

    // peminjaman
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/peminjaman/approve/{id}', [PeminjamanController::class, 'approve']);
    Route::get('/peminjaman/reject/{id}', [PeminjamanController::class, 'reject']);

    // inventaris CRUD
    Route::resource('inventaris', InventarisController::class);
});


