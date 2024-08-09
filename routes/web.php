<?php

use App\Http\Controllers\Appartementcontroller;
use App\Http\Controllers\Immeublecontroler;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Visiteurcontroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function() {
//     return view('index');
// });


Route:: resource('users', Usercontroller::class);


Route:: resource('appartements',Appartementcontroller::class);


Route:: resource('immeubles',Immeublecontroler::class);


Route:: resource('visiteurs', Visiteurcontroller::class);
