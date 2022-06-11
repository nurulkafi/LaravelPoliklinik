<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\DokterController;
use App\Http\Controllers\API\JadwalDokterController;
use App\Http\Controllers\API\JenisBiayaController;
use App\Http\Controllers\API\ObatController;
use App\Http\Controllers\API\PasienController;
use App\Http\Controllers\API\PegawaiController;
use App\Http\Controllers\API\PembayaranController;
use App\Http\Controllers\API\PemeriksaanController;
use App\Http\Controllers\API\PendaftaranController;
use App\Http\Controllers\API\PoliController;
use App\Http\Controllers\API\ResepController;
use App\Http\Controllers\API\RiwayatPemeriksaanController;
use App\Models\JadwalDokter;
use App\Models\Pendaftaran;
use App\Models\RiwayatPemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resources([
    'auth' => AuthController::class,
    'obat' => ObatController::class,
    'pasien' => PasienController::class,
    'pegawai' => PegawaiController::class,
    'poli' => PoliController::class,
    'dokter' => DokterController::class,
    'jadwal_dokter' => JadwalDokterController::class,
    'jenis_biaya' => JenisBiayaController::class,
    'pendaftaran' => PendaftaranController::class,
    'resep' => ResepController::class,
    'riwayat_pemeriksaan' => RiwayatPemeriksaanController::class,
    'pembayaran' => PembayaranController::class
]);

Route::get('detail_pemeriksaan/{id}',[
    RiwayatPemeriksaanController::class,'details'
]);

Route::get('detail_resep/{id}',[
    ResepController::class,'detail'
]);

Route::get('details_resep/{id}',[
    ResepController::class,'details'
]);

Route::get('antrian_daftar',[
    PendaftaranController::class,'antri'
]);