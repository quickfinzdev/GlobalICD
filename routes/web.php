<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CertificateController;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

use App\Models\Provider;





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

Route::get('/generatePDF', [CertificateController::class, 'generatePDF'])->name(name: 'generatePDF');
Route::post('/uploadfiles', [FileController::class, 'uploadfiles'])->name(name: 'uploadfiles');

Route::post('/auth', [UserController::class, 'auth'])->name(name: 'auth');
Route::post('/authcheck', [UserController::class, 'authcheck'])->name(name: 'authcheck');

Route::post('/add-partner', [UserController::class, 'addPartner'])->name(name: 'addPartner');
Route::get('/getPartner', [UserController::class, 'getPartner'])->name(name: 'getPartner');


Route::post('/add-iso', [CertificateController::class, 'addIso'])->name(name: 'addIso');
Route::get('/getIos', [CertificateController::class, 'getIos'])->name(name: 'getIos');




Route::get('{any?}', function (Request $request) {
    return view('app');
})->where('any', '.*');


