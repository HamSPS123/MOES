<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Models\News;
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
Route::get('/',  [UserController::class, "index"])->name('index');
Route::get('/about',  [UserController::class, "about"])->name('about');
Route::get('/news',  [UserController::class, "news"])->name('news');
Route::get('/contact',  [UserController::class, "contact"])->name('contact');



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

    Route::controller(NewsController:: class)->group(function(){
        Route::get('/news', 'index')->name('admin.news');
        Route::get('/news/add', 'index')->name('admin.news.add');
    });
});
