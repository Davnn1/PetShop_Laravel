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

Route::get('/', function () {return view('home');});

Route::get('/contactus','App\Http\Controllers\ControllerContactUs@index');
Route::get('/about','App\Http\Controllers\ControllerAbout@index');
//Route::get('/view','App\Http\Controllers\ControllerView@index');
//Route::get('/view/{no_induk}', 'App\Http\Controllers\ControllerView@detail');
Route::get('/login','App\Http\Controllers\ControllerLogin@index');
Route::post('/login/process','App\Http\Controllers\ControllerLogin@process_login');
Route::get('/change-password','App\Http\Controllers\ControllerPassword@index');
Route::post('/change-password/process','App\Http\Controllers\ControllerPassword@process_change');

Route::get('/view','App\Http\Controllers\ControllerView@index');
Route::get('/view/{kd_brg}', 'App\Http\Controllers\ControllerView@detail');

//Route bagian shop
Route::get('/home2','App\Http\Controllers\ControllerHome2@index');
Route::get('/logout','App\Http\Controllers\ControllerLogin@process_logout');
Route::get('/shop','App\Http\Controllers\ControllerShop@index');
Route::get('/groomingsply', 'App\Http\Controllers\ControllerGroomingsply@index');
Route::get('/makanan', 'App\Http\Controllers\ControllerMakanan@index');
Route::get('/cage', 'App\Http\Controllers\ControllerCage@index');

//Route untuk jasa
Route::get('/grooming', 'App\Http\Controllers\ControllerGrooming@index');
Route::get('/clinic', 'App\Http\Controllers\ControllerClinic@index');
Route::get('/training', 'App\Http\Controllers\ControllerTraining@index');
Route::get('/sitter', 'App\Http\Controllers\ControllerSitter@index');
Route::get('/form', 'App\Http\Controllers\ControllerForm@index');
Route::get('/formsewa', 'App\Http\Controllers\ControllerFormsewa@index');

//Route Back End <Products>
Route::get('/barang','App\Http\Controllers\ControllerBarang@index');
Route::get('/barang/create', 'App\Http\Controllers\ControllerBarang@create');
Route::post('/barang/create/process', 'App\Http\Controllers\ControllerBarang@process_create');
Route::get('/barang/update/{kd_brg}', 'App\Http\Controllers\ControllerBarang@update');
Route::post('/barang/update/{kd_brg}/process', 'App\Http\Controllers\ControllerBarang@process_update');
Route::get('/barang/delete/{kd_brg}', 'App\Http\Controllers\ControllerBarang@delete');
Route::post('/register','App\Http\Controllers\ControllerLogin@process_reg');

Route::get('/user','App\Http\Controllers\ControllerUser@index');
Route::get('/user/update/{username}', 'App\Http\Controllers\ControllerUser@update');
Route::post('/user/update/{username}/process', 'App\Http\Controllers\ControllerUser@process_update');
Route::get('/user/delete/{username}', 'App\Http\Controllers\ControllerUser@delete');