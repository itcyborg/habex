<?php

namespace App\Http\Controllers;

use App\Farm;
use App\Farmers;
use App\leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        return view('agronomist.dashboard');
    }

    public function farmerForm()
    {
        $counties=DB::table('counties')
            ->get();
        return view('agronomist.addFarmer',['counties'=>$counties]);
    }


    public function viewFarmers()
    {
        $counties=DB::table('counties')
            ->get();
        return view('agronomist.viewFarmers',['farmers'=>Farmers::all(),'counties'=>$counties]);
    }


    public function cropInfo()
    {
        return view('agronomist.cropinfo',['farmers'=>Farmers::all()]);
    }
    public function search(Request $request)
    {
        $farmer=Farmers::find($request->farmer);
        $farms=DB::table('farms')->where('farmer_id',$request->farmer)->get();
        return ['farmer'=>$farmer,'farms'=>$farms];
    }

    public function addFarm(Request $request)
    {
        if(Farm::create([
            'farmer_id'=>$request->farmerid,
            'county'=>$request->county,
            'constituency'=>$request->constituency,
            'ward'=>$request->ward,
            'location'=>$request->location,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'elevation'=>$request->elevation,
            'seedlingsPlanted'=>$request->numberplanted,
            'farmSize'=>$request->farmsize
        ])){
            return back()->with('status','Farm added successfully');
        }
    }

    public function leave()
    {
        $startdate=date_create(date('Y-m-d',time()));
        $existing=leave::where('employeeid',Auth::user()->id)
            ->where('year',(int) $startdate->format('Y'))
            ->where('status'.'!=','Pending')
            ->get()
            ->sum('days');
        $leave=(object) ['all'=>21,'used'=>$existing,'remaining'=>21-$existing];
        return view('agronomist.leave',['leave'=>$leave]);
    }
}
