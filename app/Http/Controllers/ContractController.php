<?php

namespace App\Http\Controllers;

use App\Models\Contract;
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
        return view('createContract');
    }

    public function store(){
        $attributes= request()->validate([
            'name'=>['required'],
            'model'=>['required'],
            'platenumber'=>['required',Rule::unique('Contracts','platenumber')],
            'description'=>[],
            'gearbox'=>['required'],
            'numberofseats'=>['required','numeric','min:2','max:6'],
            'fueltype'=>['required'],
            'horsepower'=>['required','numeric','min:1','max:1500'],
            'picture'=>['required','image']
        ]);
        $attributes['status']='working';
        $attributes['availability']='1';
        $attributes['picture']=request()->file('picture')->store('Contract-pictures');
        Contract::create($attributes);

        return redirect('Contracts');
    }

    public function destroy(Contract $Contract){
        $Contract->delete();

        return redirect('/Contracts');
    }
}
