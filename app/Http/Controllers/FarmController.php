<?php

namespace App\Http\Controllers;

use App\Farm;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_ADMIN');
    }

    public function add(Request $request)
    {
        Farm::create([
            'farmer_id'=>$request->id,
            'county'=>$request->county,
            'constituency'=>$request->constituency,
            'ward'=>$request->ward,
            'location'=>$request->location,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'elevation'=>$request->elevation,
            'seedlingsPlanted'=>$request->numberplanted,
            'farmSize'=>$request->farmsize
        ]);
    }
}
