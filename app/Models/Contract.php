<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable=[
        'client_name',
        'client_cin',
        'rent_start_date',
        'rent_end_date',
        'car_id',
        'number_of_days',
        'price',
        'payment_status',
    ];

    public function scopeFilter($query ,array $filters){
        if ($filters['search'] ?? false){
            $query
                ->where('client_name','like','%' . request('search') . '%')
                ->orWhere('client_cin','like','%' . request('search') . '%');

            $query->when($filters['gearbox'] ?? false,fn($query, $gearbox)=>
            $query->whereHas('gearbox',fn($query)=>
            $query->where('type',$gearbox)
            )
            );
        }
    }

    public function Car(){
        return $this->belongsTo(Car::class);
    }
}
