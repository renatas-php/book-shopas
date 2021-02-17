<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\CommentsController;
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
Auth::routes();

Route::get('/', [BooksController::class, 'index'])->name('index');
Route::get('/knyga/{book}', [BooksController::class, 'show'])->name('knyga');

Route::middleware(['auth'])->group(function () {

    Route::get('valdymo-panele', [HomeController::class, 'index'])->name('valdymo-panele');
    Route::get('mano-profilis/{user}', [HomeController::class, 'edit'])->name('mano-profilis');
    Route::put('mano-profilis/{user}', [HomeController::class, 'store'])->name('profilis-atnaujinti');
    Route::get('mano-knygos', [HomeController::class, 'books'])->name('mano-knygos');

    Route::get('/ideti-knyga/{book}', [BooksController::class, 'edit'])->name('redaguoti-knyga');
    Route::put('/ideti-knyga/{book}/atnaujinti', [BooksController::class, 'update'])->name('atnaujinti-knyga');
    Route::get('/ideti-knyga', [BooksController::class, 'create'])->name('ideti-knyga');
    Route::post('/', [BooksController::class, 'store'])->name('ideti');
    Route::put('patvirtinti/{id}', [BooksController::class, 'approve'])->name('patvirtinti-knyga');

    Route::get('/pranesimas/{book}', [ReportsController::class, 'create'])->name('pranesimas');
    Route::post('pranesti', [ReportsController::class, 'store'])->name('pranesti');
    Route::get('/pranesimai', [ReportsController::class, 'index'])->name('pranesimai');

    Route::post('komentuoti', [CommentsController::class, 'store'])->name('komentuoti');
});




