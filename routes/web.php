<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\GenresController;



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

//Public routes
Route::get('/', [BooksController::class, 'index'])->name('index');
Route::get('/knyga/{book}', [BooksController::class, 'show'])->name('knyga');

Route::middleware(['auth'])->group(function () {

    //User dashboard
    Route::get('valdymo-panele', [HomeController::class, 'index'])->name('valdymo-panele');
    Route::get('mano-profilis/{user}', [HomeController::class, 'edit'])->name('mano-profilis');
    Route::put('mano-profilis/{user}', [HomeController::class, 'store'])->name('profilis-atnaujinti');
    Route::get('mano-knygos', [HomeController::class, 'books'])->name('mano-knygos');

    //Book crud
    Route::get('/ideti-knyga/{book}', [BooksController::class, 'edit'])->name('redaguoti-knyga');
    Route::put('/ideti-knyga/{book}/atnaujinti', [BooksController::class, 'update'])->name('atnaujinti-knyga');
    Route::get('/ideti-knyga', [BooksController::class, 'create'])->name('ideti-knyga');
    Route::post('/', [BooksController::class, 'store'])->name('ideti');

    //Report about book crud
    Route::get('/pranesimas/{book}', [ReportsController::class, 'create'])->name('pranesimas');
    Route::post('pranesti', [ReportsController::class, 'store'])->name('pranesti');
    Route::get('/pranesimai', [ReportsController::class, 'index'])->name('pranesimai');
    
    //Comments store
    Route::post('komentuoti', [CommentsController::class, 'store'])->name('komentuoti');

    Route::middleware(['admin'])->group(function () {

        //Admin book approve(AJAX)
        Route::put('patvirtinti/{id}', [BooksController::class, 'approve'])->name('patvirtinti-knyga');

        //Author crud
        Route::get('autoriai/', [AuthorsController::class, 'index'])->name('visi-autoriai');
        Route::get('ideti-autoriu/', [AuthorsController::class, 'create'])->name('ideti-autoriu');
        Route::post('ideti-autoriu/', [AuthorsController::class, 'store'])->name('author-store');
        Route::get('redaguoti-autoriu/{author}', [AuthorsController::class, 'edit'])->name('author-edit');
        Route::put('redaguoti-autoriu/{author}/atnaujinti', [AuthorsController::class, 'update'])->name('author-update');

        //Genres crud
        Route::get('zanrai/', [GenresController::class, 'index'])->name('visi-zanrai');
        Route::get('ideti-zanra/', [GenresController::class, 'create'])->name('ideti-zanra');
        Route::post('ideti-zanra/', [GenresController::class, 'store'])->name('genre-store');
        Route::get('redaguoti-zanra/{genre}', [GenresController::class, 'edit'])->name('genre-edit');
        Route::put('redaguoti-zanra/{genre}/atnaujinti', [GenresController::class, 'update'])->name('genre-update');
        

    });
});




