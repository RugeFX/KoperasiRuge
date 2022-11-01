<?php

use App\Http\Controllers\anggotaController;
use App\Http\Controllers\jenisSimpananController;
use App\Http\Controllers\pengambilanController;
use App\Http\Controllers\penggunaController;
use App\Http\Controllers\pinjamanController;
use App\Http\Controllers\pinjamanDetailController;
use App\Http\Controllers\simpananController;
use App\Http\Controllers\CookieController;
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
Route::get('/sidebar', function () {
    return view('sidebar');
});
Route::resource('angg', anggotaController::class);
Route::resource('jen', jenisSimpananController::class);
Route::resource('user', penggunaController::class);
Route::get('/noanggota', [simpananController::class, 'noanggota']);
Route::get('/jenis', [simpananController::class, 'jenis']);
Route::get('/infoangg', [simpananController::class, 'infoangg']);
Route::resource('simp', simpananController::class);
Route::get('/info', [pinjamanController::class, 'info']);
Route::resource('pinj', pinjamanController::class);
Route::get('/caridetail', [pinjamanDetailController::class, 'caridetail']);
Route::get('/infoanggotadetail', [pinjamanDetailController::class, 'info']);
Route::get('/infopinjaman', [pinjamanDetailController::class, 'infopinjaman']);
Route::get('/getidpinjam', [pinjamanDetailController::class, 'getidpinjam']);
Route::resource('dpin', pinjamanDetailController::class);
Route::get('/infopeng', [pengambilanController::class, 'infopeng']);
Route::get('/datasimp', [pengambilanController::class, 'datasimp']);
Route::get('/datapeng', [pengambilanController::class, 'datapeng']);
Route::post('/ajaxStore', [pengambilanController::class, 'ajaxStore']);
Route::resource('peng', pengambilanController::class);

Route::post('/set-cookie', [CookieController::class, 'setCookie']);