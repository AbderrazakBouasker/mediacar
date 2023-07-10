<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(){
        return view('carsList',[
        'cars'=>car::filter(request(['search']))->get()
        ]);
    }
    public function show(car $car){
        return view('carPage',[
            'car'=>$car
        ]);
    }
    public function edit(car $car){
        $car->update();
    }
    public function create(){
        return view('createCar');
    }

}

