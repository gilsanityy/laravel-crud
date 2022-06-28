<?php

use App\Http\Controllers\CustomAuthController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/users/add', [UserController::class, 'add'])->name('users.add');

Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

Route::post('/users/{user}/update', [UserController::class, 'update'])->name('users.update');

Route::get('/users/{user}/destroy', [UserController::class, 'destroy'])->name('users.destroy');
