<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ContractController;
use App\Models\Car;
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
})->name('home');

Route::get('cars',[CarController::class,'index']);

Route::get('cars/create',[CarController::class,'create']);

Route::post('cars/create/store',[CarController::class,'store']);

Route::get('cars/{car:platenumber}',[CarController::class,'show']);

Route::patch('cars/{car:platenumber}',[CarController::class,'update']);

Route::delete('cars/{car:platenumber}',[CarController::class,'destroy']);

Route::get('contract',[ContractController::class,'index']);


