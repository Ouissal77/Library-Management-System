<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::middleware(['auth','isAdmin'])->group(function(){
    Route::group(['prefix' => 'admin', 'as' => 'admin.'],function (){
        Route::group(['prefix' => 'books', 'as' => 'books.'], function () {
            Route::get('/', [BookController::class, 'index'])->name('index');
            Route::get('/create', [BookController::class, 'create'])->name('create');
            Route::post('/store', [BookController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [BookController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [BookController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [BookController::class, 'delete'])->name('delete');
            Route::get('/{id}', [BookController::class, 'show'])->name('show');

        });
        Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
            Route::get('/', [BookController::class, 'index'])->name('index');
            Route::get('/create', [BookController::class, 'create'])->name('create');
            Route::post('/store', [BookController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [BookController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [BookController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [BookController::class, 'delete'])->name('delete');
            Route::get('/{id}', [BookController::class, 'show'])->name('show');

        });
        Route::group(['prefix' => 'authors', 'as' => 'authors.'], function () {
            Route::get('/', [AuthorController::class, 'index'])->name('index');
            Route::get('/create', [AuthorController::class, 'create'])->name('create');
            Route::post('/store', [AuthorController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AuthorController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [AuthorController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [AuthorController::class, 'delete'])->name('delete');
            Route::get('/{id}', [AuthorController::class, 'show'])->name('show');

        });

        Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/store', [CategoryController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
            Route::get('/{id}', [CategoryController::class, 'show'])->name('show');

        });
    });

});




Auth::routes();

Route::get('/users', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::post('/logout', 'Auth\AuthenticatedSessionController@destroy')->name('logout');


