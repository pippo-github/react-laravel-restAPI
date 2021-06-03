<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ApplicationController;
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


Route::get('/',[App\Http\Controllers\ApplicationController::class, "index"]);
Route::post('/post',"App\Http\Controllers\ApplicationController@postAPI");
Route::post('/resetDB',"App\Http\Controllers\ApplicationController@resetDB");
