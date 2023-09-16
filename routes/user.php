<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Providers\RouteServiceProvider;
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

Route::get('/', function () {
    if(Auth::check()){
        if(Auth::user()->role==1){
            $action=RouteServiceProvider::AdminHOME;
        }
        else if(Auth::user()->role==0){
            $action= RouteServiceProvider::UserHOME;
        }
    }

    else {
        $action='/';
    }

    return view('welcome')->with([
        'action' => $action,
    ]);
});


    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/book-info/{id}', [UserController::class, 'bookInfo'])->name('bookInfo');
        Route::get('/author-info/{id}', [UserController::class, 'authorInfo'])->name('authorInfo');
        Route::get('/category-info/{id}', [UserController::class, 'categoryInfo'])->name('categoryInfo');

        Route::get('/ticket/{id}', [UserController::class, 'ticket'])->name('ticket');


        Route::post('/borrow/{book}/{user}', [UserController::class, 'borrow'])->name('borrow');


    });



