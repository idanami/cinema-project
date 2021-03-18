<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login_con;
use App\Http\Controllers\Cinema_con;
use App\Http\Controllers\Home;

use App\Http\Controllers\DynamicDependent;
use App\Http\Controllers\UpdateCinema;
use PhpParser\Node\Stmt\Return_;

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


Route::get('/cinemaupdate/{id}',[Cinema_con::class,'cinemaUpdate']);
Route::get('/movieupdate/{id}',[Cinema_con::class,'movieUpdate']);


Route::get('/update_data',[UpdateCinema::class,'cinemaUpdate']);





Route::get('/update',[Home::class,'update']);
Route::get('/newupdate/{id}',[Home::class,'newupdate']);

// Route::get('/dynamicdependent',[DynamicDependent::class,'index'])->name('test');
Route::get('/dynamicdependent-fetch_movie',[DynamicDependent::class,'fetchMovie'])->name('fetchmovie');
Route::get('/dynamicdependent-fetch_time',[DynamicDependent::class,'fetchTimes'])->name('fetchtimes');
