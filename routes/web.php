<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/index', function () {
    return view('adminLayout/index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/listdosen', [App\Http\Controllers\HomeController::class, 'listdosen'])->name('listdosen');

Route::get('/listmatkul', [App\Http\Controllers\HomeController::class, 'listmatkul'])->name('listmatkul');

Route::post('/listdosen/storedosen', [HomeController::class, 'storedosen']);

Route::post('/listmatkul/storematkul', [HomeController::class, 'storematkul']);

Route::patch('/listdosen/update/{dosen:slug}', [HomeController::class, 'updatedosen']);

Route::delete('/listdosen/delete/{dosen:slug}', [HomeController::class, 'deletedosen']);

Route::patch('/listmatkul/update/{matkul:slug}', [HomeController::class, 'updatematkul']);

Route::delete('/listmatkul/delete/{matkul:slug}', [HomeController::class, 'deletematkul']);
