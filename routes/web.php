<?php

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
});

Route::get('cars',function (){
    return view('carsList',[
        'cars'=>car::all()
    ]);
});

Route::get('cars/{car:platenumber}',function (car $car){
    return view('carPage',[
        'car'=>$car
    ]);
});
