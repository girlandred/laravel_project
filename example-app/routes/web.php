<?php

use App\Http\Controllers\ProductController;
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
});

require __DIR__ . '/auth.php';
