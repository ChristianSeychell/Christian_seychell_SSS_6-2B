<?php

use App\Http\Controllers\carozzaController;
use App\Http\Controllers\manufacturerController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cars', [carozzaController::class,'index'])->name('cars.index');

Route::get('/cars/create',  [carozzaController::class,'create'])->name('cars.create');

Route::get('/cars/{id}',  [carozzaController::class,'show'])->name('cars.show');


Route::get('/manufacturers/index',  [manufacturerController::class,'index'])->name('manufacturers.index');

