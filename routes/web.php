<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DrugsController;
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

Route::get('/', function () {
    return view('login');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/beranda', [DrugsController::class, 'index'])->name('beranda');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/tambahData', [DrugsController::class, 'addDrug'])->name('addDrug');
Route::post('/insert', [DrugsController::class, 'insert'])->name('insert');
Route::get('/edit/{id}',[DrugsController::class, 'show'])->name('edit');
Route::post('/update/{id}',[DrugsController::class, 'update'])->name('update');

Route::get('/delete/{id}', [DrugsController::class, 'destroy'])->name('delete');