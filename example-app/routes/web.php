<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProductController;
use App\Models\Gallery;
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

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'products', 'as' => 'products'], function () {
        Route::get('', [ProductController::class, 'index'])->name('.index');
        Route::get('/create', [ProductController::class, 'create'])->name('.create');
        Route::post('', [ProductController::class, 'store'])->name('.store');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('.edit');
        Route::patch('/{product}', [ProductController::class, 'update'])->name('.update');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('.destroy');
        Route::get('/{product}', [ProductController::class, 'show'])->name('.show');
    });


    Route::group(['prefix' => 'posts', 'as' => 'posts'], function () {
        Route::get('', [PostsController::class, 'index'])->name('.index');
        Route::get('/create', [PostsController::class, 'create'])->name('.create');
        Route::post('', [PostsController::class, 'store'])->name('.store');
        Route::get('/{post}/edit', [PostsController::class, 'edit'])->name('.edit');
        Route::patch('/{post}', [PostsController::class, 'update'])->name('.update');
        Route::delete('/{post}', [PostsController::class, 'destroy'])->name('.destroy');
        Route::get('/{post}', [PostsController::class, 'show'])->name('.show');
    });

    Route::get('/galleries', [GalleryController::class, 'index']);
    Route::post('/galleries', [GalleryController::class, 'store']);
    Route::get('/fetch-data', [GalleryController::class, 'fetchData']);
});

require __DIR__ . '/auth.php';
