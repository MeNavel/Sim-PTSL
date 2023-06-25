<?php

use App\Http\Controllers\desa\Sidorejo\SidorejoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ktp\PemohonController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('sidorejo', SidorejoController::class);
    Route::resource('pemohon', PemohonController::class);
    Route::get('autocomplete', [PemohonController::class, 'autocompleteSearch'])->name('autocomplete');
    Route::post('pemohon/destroy/{id}', [PemohonController::class, 'destroy'])->name('destroy');
    Route::post('pemohon/cek-ktp', [SidorejoController::class, 'cek_ktp'])->name('cek_ktp');
});
