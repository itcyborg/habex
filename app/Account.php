<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable=[
        'idnumber',
        'paymentoption',
        'accountname',
        'bank',
        'accountnumber'
    ];
    //
}
