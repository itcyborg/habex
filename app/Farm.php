<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    protected $fillable=[
        'farmer_id',
        'county',
        'constituency',
        'ward',
        'location',
        'latitude',
        'longitude',
        'elevation',
        'seedlingsPlanted',
        'farmSize'
    ];
    //
}
