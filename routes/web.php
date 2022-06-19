<?php

use App\Http\Controllers\API\DokterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DokterController as ControllersDokterController;
use App\Http\Controllers\JadwalDokterController;
use App\Http\Controllers\JenisBiayaController;
use App\Http\Controllers\MediaPembayaranController;
use App\Http\Controllers\PendaftaranController;
use App\Models\MediaPembayaran;
use App\Models\Pendaftaran;
use App\Http\Controllers\PemeriksaanController;
use App\Models\Dokter;
use App\Http\Controllers\PembayaranContorller;

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

Route::get('/logout',[LoginController::class,'logout']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => ['role:Admin']],function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/pasien',PasienController::class);
        Route::resource('/obat',ObatController::class);
        Route::resource('/pegawai',PegawaiController::class);
        Route::resource('/dokter',ControllersDokterController::class);
        Route::resource('/media_pembayaran', MediaPembayaranController::class);
        Route::resource('/jenis_biaya', JenisBiayaController::class);
        Route::resource('/pendaftaran', PendaftaranController::class);
        Route::resource('/poli',PoliController::class);
        Route::resource('/jadwal_dokter',JadwalDokterController::class);
        Route::resource('/pemeriksaan',PemeriksaanController::class);
        Route::resource('/pembayaran',PembayaranContorller::class);
    });
});

Route::get('/landing_page',function(){
    return view('landing_page.home');
});