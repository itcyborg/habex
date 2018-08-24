<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmers extends Model
{
    protected $fillable = [
            'sirname',
            'firstname',
            'lastname',
            'idnumber',
            'mobilenumber',
            'contractform',
            'passport',
            'idfront',
            'idback',
            'email'
    ];
    //
}
