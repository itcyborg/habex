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

    public function map()
    {
        return view('admin.map');
    }

    public function mapData()
    {
        return Farm::where('latitude','!=',null)->where('longitude','!=',null)->get(['county','constituency','farmer_id','location','latitude','longitude','farmSize','elevation'])->jsonSerialize();
    }

    public function editFarm(Request $request)
    {
        if($request->action==='edit') {
            $farm = Farm::find($request->id);
            $farm->elevation=$request->elevation;
            $farm->longitude=$request->longitude;
            $farm->latitude=$request->latitude;
            $farm->farmSize=$request->farmSize;
            $farm->seedlingsPlanted=$request->seedlings;
            if($farm->save()){
                return $request->all();
            }
        }else{
            return response('Error',401);
        }
    }
}
