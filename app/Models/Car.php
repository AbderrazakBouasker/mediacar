<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'model',
        'platenumber',
        'description',
        'gearbox',
        'numberofseats',
        'fueltype',
        'horsepower',
        'status',
        'availability',
        'picture',
    ];

    public function scopeFilter($query ,array $filters){
        if ($filters['search'] ?? false){
            $query
                ->where('name','like','%' . request('search') . '%')
                ->orWhere('platenumber','like','%' . request('search') . '%');

            $query->when($filters['gearbox'] ?? false,fn($query, $gearbox)=>
            $query->whereHas('gearbox',fn($query)=>
            $query->where('type',$gearbox)
            )
            );
        }
    }


}
