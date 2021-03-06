<?php

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
    return redirect(\route('login'));
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');

Auth::routes();

Route::get('data', [
    \App\Http\Controllers\DataController::class, 'index'
])->name('data');

Route::get('calon', [
    \App\Http\Controllers\CalonController::class, 'index'
])->name('calon');

Route::get('kandidat', [
    \App\Http\Controllers\KandidatController::class, 'index'
])->name('kandidat');

Route::get('saw', [
    \App\Http\Controllers\SawController::class, 'index'
])->name('saw');

Route::get('user', [
    \App\Http\Controllers\UserManagementController::class, 'index'
])->name('user');

Route::get('/pdf', [
    \App\Http\Controllers\ExportController::class, 'exportPDF'
])->name('exportPDF');



