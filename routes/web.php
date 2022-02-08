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

Route::get('/login',
    [\Admin\Entrypoint\Http\User\Command\UserPostController::class, 'authenticate'])->middleware('throttle:3,1');
Route::get('register', [\Admin\Entrypoint\Http\User\Command\UserPostController::class, 'register']);
Route::get('logout', [\Admin\Entrypoint\Http\User\Command\UserPostController::class, 'logOut']);
