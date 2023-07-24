<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

// Route::get('/blogs', function () {
//     return view('admin.blogs.index');
// });

// Route::get('/{pathMatch}', function(){
//     return view('welcome');
// })->where('pathMatch', ".*");

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('posts', PostController::class)->except('show');

    Route::resource('tags', TagController::class);

    Route::prefix('admin')->group(function () {
        Route::resource('categories', CategoryController::class)->names('admin.categories');
    });
});

Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
