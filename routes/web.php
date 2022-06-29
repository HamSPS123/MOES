<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MainNewsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
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

// Sites Router
Route::get('/',  [MainController::class, "mainIndex"])->name('index');
Route::get('/about',  [AboutController::class, "aboutIndex"])->name('about');
Route::get('/news',  [MainNewsController::class, "mainnewsIndex"])->name('news');
Route::get('/contact',  [ContactController::class, "contactIndex"])->name('contact');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::prefix('dashboard')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index'); // users/employee
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users'); // users/employee
    Route::get('/user/update', [AdminController::class, 'userUpdate'])->name('admin.update-user-profile'); // users/employee

    Route::controller(NewsController::class)->group(function(){
        Route::get('/news', 'index')->name('admin.news');
        Route::get('/news/add', 'index')->name('admin.news.add');
        Route::get('/news/edit/{id?}', 'edit')->name('admin.news.edit');
    });
});
