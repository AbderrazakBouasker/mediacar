<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Contract;
use Barryvdh\DomPDF\Facade\Pdf;
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
        if (Request()->has('contract_request')){
            $pdf=Pdf::loadView('contractBody',['contract'=>$Contract]);
            return $pdf->stream('contract'.$Contract['id'].'.pdf');
        }
        return view('ContractPage',[
            'contract'=>$Contract,
            'cars'=>Car::all(),
        ]);
    }
    public function update(Contract $Contract){
        $attributes= request()->validate([
            'client_name'=>['required'],
            'client_cin'=>['required'],
            'rent_start_date'=>['required','date_format:Y-m-d\TH:i'],
            'car_id'=>['required','numeric'],
            'number_of_days'=>['required','numeric'],
            'payment_status'=>['required','boolean'],
        ]);
        $attributes['rent_end_date']=carbon::parse($attributes['rent_start_date'])->addDays($attributes['number_of_days']);
        $attributes['price']=Car::find($attributes['car_id'])->price*$attributes['number_of_days'];
        $Contract->update($attributes);

        return redirect('/contract');
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
        Contract::create($attributes);

        return redirect('/contract');
    }

    public function destroy(Contract $Contract){
        $Contract->delete();

        return redirect('/contract');
    }
}
