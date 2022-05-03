<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login_con;
use App\Http\Controllers\Cinema_con;
use App\Http\Controllers\Home;

use App\Http\Controllers\DynamicDependent;
use App\Http\Controllers\UpdateCinema;
use Illuminate\Support\Facades\Auth;
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

//connected
Route::get('/register',[Login_con::class,'show_signup_form']);
Route::post('/register_process',[Login_con::class,'process_signup']);
Route::get('/login',[Login_con::class,'show_login_form']);
Route::post('/login_process',[Login_con::class,'process_login']);
Route::get('/logout',[Login_con::class,'logout']);

//home
Route::get('/cinema-home',[Home::class,'index']);
Route::get('/cinema-home_master',[Home::class,'masterPage']);

//update
Route::post('/add-cinema',[UpdateCinema::class,'cinemaUpdate']);
Route::post('/add-movie',[UpdateCinema::class,'movieUpdate']);
Route::post('/add-radiations',[UpdateCinema::class,'radiationsUpdate']);
Route::post('/cinemaupdate_seats',[UpdateCinema::class,'cinemaUpdateSeats']);

//dynamic ajax
Route::get('/dynamicdependent-fetch_movie',[DynamicDependent::class,'fetchMovie'])->name('fetchmovie');
Route::get('/dynamicdependent-fetch_time',[DynamicDependent::class,'fetchTimes'])->name('fetchtimes');
Route::get('/dynamicdependent-fetch_seats',[DynamicDependent::class,'fetchSeats'])->name('fetchseats');


