<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ObatController;
use App\Http\Controllers\API\PasienController;
use App\Http\Controllers\API\PegawaiController;
use App\Http\Controllers\API\PoliController;
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
    'poli' => PoliController::class
]);
