<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ComplaintController::class, 'index'])->name('index');

Route::prefix('buat-pengaduan')->group(function () {
    Route::get('/', function () {
        return view('complaint.create');
    })->name('complaint');

    Route::post('/', [ComplaintController::class, 'create'])->name('complaint.create');
});
Route::get('/pengaduan/{id}', [ComplaintController::class, 'detail'])->name('complaint.detail');

// Route::get('/', [AuthController::class, 'check']);
Route::get('/login', [AuthController::class, 'check'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'role:ADMIN,STAFF']], function () {
    Route::get('/dashboard', [ComplaintController::class, 'dashboard'])->name('dashboard');
});

Route::group(['middleware' => ['auth'], 'role:ADMIN'], function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('users', [UserController::class, 'index'])->name('index');
        Route::prefix('user')->name('user.')->group(function () {
            Route::post('/user', [UserController::class, 'create'])->name('create');
            Route::delete('/user/{id}', [UserController::class, 'delete'])->name('delete');
        });
    });
});

Route::group(['middleware' => ['auth'], 'role:STAFF'], function () {
    // TODO: improve print
    Route::get('/pengaduan/print/{id}', [ComplaintController::class, 'print'])->name('complaint.print');
    Route::prefix('complaint')->name('complaint.')->group(function () {
        Route::delete('/{id}', [ComplaintController::class, 'delete'])->name('delete');
        Route::patch('/{id}', [ComplaintController::class, 'update'])->name('update');
    });
});
