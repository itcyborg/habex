<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgronomistController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_AGRONOMIST');
    }

    public function index()
    {
        echo "Agronomist";
    }
}
