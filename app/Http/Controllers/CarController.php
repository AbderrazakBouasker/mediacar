<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
    public function update(car $car){
        $attributes= request()->validate([
            'name'=>['required'],
            'model'=>['required'],
            'platenumber'=>['required',Rule::unique('cars','platenumber')->ignore($car->id)],
            'description'=>[],
            'gearbox'=>['required'],
            'numberofseats'=>['required','numeric','min:2','max:6'],
            'fueltype'=>['required'],
            'horsepower'=>['required','numeric','min:1','max:1500'],
            'picture'=>['image'],
        ]);
        if (isset($attributes['picture'])){
            $attributes['picture']=request()->file('picture')->store('car-pictures');
        }
        $car->update($attributes);

        return redirect('/cars');
    }
    public function create(){
        return view('createCar');
    }

    public function store(){
        $attributes= request()->validate([
            'name'=>['required'],
            'model'=>['required'],
            'platenumber'=>['required',Rule::unique('cars','platenumber')],
            'description'=>[],
            'gearbox'=>['required'],
            'numberofseats'=>['required','numeric','min:2','max:6'],
            'fueltype'=>['required'],
            'horsepower'=>['required','numeric','min:1','max:1500'],
            'picture'=>['required','image']
        ]);
        $attributes['status']='working';
        $attributes['availability']='1';
        $attributes['picture']=request()->file('picture')->store('car-pictures');
        Car::create($attributes);

        return redirect('cars');
    }

    public function destroy(Car $car){
        $car->delete();

        return redirect('/cars');
    }
}

