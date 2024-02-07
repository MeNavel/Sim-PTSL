<?php

use App\Http\Controllers\Desa\KramatSukoharjoController;
use App\Http\Controllers\Desa\MundurejoController;
use App\Http\Controllers\Desa\PondokjoyoController;
use App\Http\Controllers\Desa\SemboroController;
use App\Http\Controllers\Desa\SidomekarController;
use App\Http\Controllers\Desa\SidomulyoController;
use App\Http\Controllers\Desa\SidorejoController;
use App\Http\Controllers\Desa\SumberagungController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KoordinatorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UnduhDataController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('koordinator', KoordinatorController::class);
    Route::post('koordinator/dusun', [KoordinatorController::class, 'dusun'])->name('koordinator.dusun');

    //kramatsukoharjo
    Route::resource('kramatsukoharjo', KramatSukoharjoController::class);
    Route::post('kramatsukoharjo/cek-ktp', [KramatSukoharjoController::class, 'cek_nominatif'])->name('kramatsukoharjo.cek_nominatif');
    Route::post('kramatsukoharjo/cek-nib', [KramatSukoharjoController::class, 'cek_nib'])->name('kramatsukoharjo.cek_nib');
    Route::get('kramatsukoharjo/{id}/berkas', [KramatSukoharjoController::class, 'berkas'])->name('kramatsukoharjo.berkas');

    //semboro
    Route::resource('semboro', SemboroController::class);
    Route::post('semboro/cek-ktp', [SemboroController::class, 'cek_ktp'])->name('semboro.cek_ktp');
    Route::post('semboro/cek-nib', [SemboroController::class, 'cek_nib'])->name('semboro.cek_nib');
    Route::get('semboro/{id}/berkas', [SemboroController::class, 'berkas'])->name('semboro.berkas');

    //sidomulyo
    Route::resource('sidomulyo', SidomulyoController::class);
    Route::post('sidomulyo/cek-ktp', [SidomulyoController::class, 'cek_ktp'])->name('sidomulyo.cek_ktp');
    Route::post('sidomulyo/cek-nib', [SidomulyoController::class, 'cek_nib'])->name('sidomulyo.cek_nib');
    Route::get('sidomulyo/{id}/berkas', [SidomulyoController::class, 'berkas'])->name('sidomulyo.berkas');

    //sidorejo
    Route::resource('sidorejo', SidorejoController::class);
    Route::post('sidorejo/cek-ktp', [SidorejoController::class, 'cek_ktp'])->name('sidorejo.cek_ktp');
    Route::post('sidorejo/cek-nib', [SidorejoController::class, 'cek_nib'])->name('sidorejo.cek_nib');
    Route::get('sidorejo/{id}/berkas', [SidorejoController::class, 'berkas'])->name('sidorejo.berkas');

    //Pondokjoyo
    Route::resource('pondokjoyo', PondokjoyoController::class);
    Route::post('pondokjoyo/cek-ktp', [PondokjoyoController::class, 'cek_ktp'])->name('pondokjoyo.cek_ktp');
    Route::post('pondokjoyo/cek-nib', [PondokjoyoController::class, 'cek_nib'])->name('pondokjoyo.cek_nib');
    Route::get('pondokjoyo/{id}/berkas', [PondokjoyoController::class, 'berkas'])->name('pondokjoyo.berkas');

    //Mundurejo
    Route::resource('mundurejo', MundurejoController::class);
    Route::post('mundurejo/cek-ktp', [MundurejoController::class, 'cek_ktp'])->name('mundurejo.cek_ktp');
    Route::post('mundurejo/cek-nib', [MundurejoController::class, 'cek_nib'])->name('mundurejo.cek_nib');
    Route::get('mundurejo/{id}/berkas', [MundurejoController::class, 'berkas'])->name('mundurejo.berkas');

    //Sumberagung
    Route::resource('sumberagung', SumberagungController::class);
    Route::post('sumberagung/cek-ktp', [SumberagungController::class, 'cek_ktp'])->name('sumberagung.cek_ktp');
    Route::post('sumberagung/cek-nib', [SumberagungController::class, 'cek_nib'])->name('sumberagung.cek_nib');
    Route::get('sumberagung/{id}/berkas', [SumberagungController::class, 'berkas'])->name('sumberagung.berkas');

    //Sidomekar
    Route::resource('sidomekar', SidomekarController::class);
    Route::post('sidomekar/cek-ktp', [SidomekarController::class, 'cek_ktp'])->name('sidomekar.cek_ktp');
    Route::post('sidomekar/cek-nib', [SidomekarController::class, 'cek_nib'])->name('sidomekar.cek_nib');
    Route::get('sidomekar/{id}/berkas', [SidomekarController::class, 'berkas'])->name('sidomekar.berkas');

    Route::controller(UnduhDataController::class)->group(function () {
        Route::get('/unduh', 'index')->name('unduh.index');
        Route::get('/unduh/{desa}', 'desaLengkap')->name('unduh.desa.lengkap');
        Route::get('/unduh/{desa}/perkoordinator', 'desaPerKoordinator')->name('unduh.desa.perkoordinator');
    });

    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/home', 'index')->name('home');
        Route::get('/home/{desa}', 'showDataBPN')->name('showDataBPN');
        Route::post('/home/{desa}/update', 'updateDataBPN')->name('updateDataBPN');
        Route::post('/home/{desa}/cek', 'cekDataBPN')->name('cekDataBPN');
    });
});
