<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerjalananController;
use App\Http\Controllers\LoginController;

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

Route::get('/', function () {
    return view('login');
})->name('login_view');
Route::get('/data-perjalanan', [PerjalananController::class, "index"])->name("index");
Route::post('/login', [LoginController::class, "login"])->name('login');
Route::post('/logout', [LoginController::class, "logout"])->name('logout');
Route::post('/data-perjalanan/store', [PerjalananController::class, "store"])->name("perjalanan.store");
