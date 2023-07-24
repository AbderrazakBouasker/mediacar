<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Contract;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContractController extends Controller
{
    public function index(){
        return view('ContractsList',[
            'Contracts'=>Contract::filter(request(['search']))->get()
        ]);
    }
    public function show(Contract $Contract){
        return view('ContractPage',[
            'Contract'=>$Contract
        ]);
    }
    public function update(Contract $Contract){
        $attributes= request()->validate([
            'name'=>['required'],
            'model'=>['required'],
            'platenumber'=>['required',Rule::unique('Contracts','platenumber')->ignore($Contract->id)],
            'description'=>[],
            'gearbox'=>['required'],
            'numberofseats'=>['required','numeric','min:2','max:6'],
            'fueltype'=>['required'],
            'horsepower'=>['required','numeric','min:1','max:1500'],
            'picture'=>['image'],
        ]);
        if (isset($attributes['picture'])){
            $attributes['picture']=request()->file('picture')->store('Contract-pictures');
        }
        $Contract->update($attributes);

        return redirect('/Contracts');
    }
    public function create(){
        return view('createContract',['cars'=>Car::all()]);
    }

    public function store(){
        $attributes= request()->validate([
            'client_name'=>['required'],
            'client_cin'=>['required'],
            'rent_start_date'=>['required','date_format:Y-m-d\TH:i'],
            'car_id'=>['required','numeric'],
            'number_of_days'=>['required','numeric'],
        ]);
        $attributes['rent_end_date']=carbon::parse($attributes['rent_start_date'])->addDays($attributes['number_of_days']);
        $attributes['price']=Car::find($attributes['car_id'])->price*$attributes['number_of_days'];
        $attributes['payment_status']=0;
//        $attributes['file']=request()->file('file')->store('Contract-file');
        Contract::create($attributes);

        return redirect('/contract');
    }

    public function destroy(Contract $Contract){
        $Contract->delete();

        return redirect('/Contracts');
    }
}
