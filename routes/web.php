<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('cars',[CarController::class,'index']);

Route::get('cars/create',[CarController::class,'create']);

Route::post('cars/create/store',[CarController::class,'store']);

Route::get('cars/{car:platenumber}',[CarController::class,'show']);

Route::patch('cars/{car:platenumber}',[CarController::class,'update']);

Route::delete('cars/{car:platenumber}',[CarController::class,'destroy']);

Route::get('contract',[ContractController::class,'index']);

Route::get('contract/{contract:id}',[ContractController::class,'show']);

Route::get('contract/create',[ContractController::class,'create']);

Route::patch('contract/{contract:id}',[ContractController::class,'update']);

Route::delete('contract/{contract:id}',[ContractController::class,'destroy']);
