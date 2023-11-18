<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\MultiUserController;
use App\Http\Controllers\PerintahController;
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

Route::get('/', [MultiUserController::class, 'index'])->name('multiUser');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/validation', [LoginController::class, 'login'])->name('loginValidate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::view("/beranda", 'beranda')->name('adminBeranda');

    Route::get('/setting/update', [PerintahController::class, 'ubahPerintah'])->name('ubahSetting');
    Route::get('/setting/read', [PerintahController::class, 'readSetting'])->name('readSettingSystem');
    Route::get('/setting/status/alat', [PerintahController::class, 'statusKoneksiAlat'])->name('statusKoneksiSystem');

    Route::get('/monitoring', [MonitoringController::class, 'index'])->name('dataMonitoring');
    Route::get('/monitoring/json', [MonitoringController::class, 'dataJson'])->name('monitoringJson');
    Route::get('/monitoring/chart', [MonitoringController::class, 'dataChart'])->name('monitoringChart');
});
