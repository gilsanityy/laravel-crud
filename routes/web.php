<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Auth;
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
Route::group(['middleware' => 'preventBackHistory'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('auth.index')->middleware('accessControl');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
    Route::get('/register', [RegistrationController::class, 'register'])->name('auth.registration');
    Route::post('/register/store', [RegistrationController::class, 'store'])->name('auth.store');
});

Route::middleware('checkAuth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/add', [UserController::class, 'add'])->name('users.add');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/{user}/update', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{user}/destroy', [UserContrsoller::class, 'destroy'])->name('users.destroy');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware(['guest:admin', 'preventBackHistory'])->group(function () {
        Route::view('/login', 'admin.login')->name('login');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:admin', 'preventBackHistory'])->group(function () {
        Route::view('/home', 'admin.home')->name('home');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});
