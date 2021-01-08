<?php

use App\Http\Controllers\Auth\AuthController\LoginController;
use App\Http\Controllers\Auth\AuthController\RegisterController;
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

// Route::auth();

// Route::post('login',[LoginController::class,'loginUser']);
// Route::post('registration', [RegisterController::class, 'registerUser']);
