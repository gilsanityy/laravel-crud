<?php

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

Route::get('/user', function () {
    $names = ['Alpha', 'Bravo', 'Charlie', 'Delta'];

    foreach ($names as $name) {
        print ($name) . '<br>';
    }
})->name('userList');

Route::get('/user/{index}/{name?}', function ($index, $name = 'Test') {
    $names = ['Alpha', 'Bravo', 'Charlie', 'Delta'];
    return $names[$index] . ' ' . $name;
});
