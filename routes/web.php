<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

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

Route::get('/', [BooksController::class, 'index'])->name('index');

Route::get('/ideti-knyga', [BooksController::class, 'create'])->name('ideti-knyga');
Route::get('/knyga/{book}', [BooksController::class, 'show'])->name('knyga');
Route::post('/', [BooksController::class, 'store'])->name('ideti');

Route::get('valdymo-panele', [App\Http\Controllers\HomeController::class, 'index'])->name('valdymo-panele');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

