<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login_con;
use App\Http\Controllers\Home;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DynamicDependent;

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

Route::get('/register',[Login_con::class,'show_signup_form']);
Route::post('/register_process',[Login_con::class,'process_signup']);
Route::get('/login',[Login_con::class,'show_login_form']);
Route::post('/login_process',[Login_con::class,'process_login']);
Route::get('/logout',[Login_con::class,'logout']);

Route::get('/cinema-home',[Home::class,'index']);


Route::get('/test',[DynamicDependent::class,'index'])->name('test');
Route::get('/test2',[DynamicDependent::class,'fetch'])->name('test2');


// Route::get('/login',[LoginController::class,'login']);
// Route::post('/login_process',[LoginController::class,'authenticate']);
