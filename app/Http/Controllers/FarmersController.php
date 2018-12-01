<?php

namespace App\Http\Controllers;

use App\Account;
use App\Farm;
use App\Farmers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FarmersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add(Request $request)
    {
//        $this->validate($request,[
//            'sirname'=>'required',
//            'firstname'=>'required',
//            'idnumber'=>'required',
//            'mobilenumber'=>'required',
//            'county'=>'required',
//            'constituency'=>'required',
//            'ward'=>'required',
//            'location'=>'required',
//            'latitude'=>'required',
//            'longitude'=>'required',
//            'elevation'=>'required',
//            'numberplanted'=>'required',
//            'farmsize'=>'required',
//            'paymentoption'=>'required',
//            'accountname'=>'required',
//            'accountnumber'=>'required'
//        ]);

//        dd($request->all());
        /**
         * file uploads
         * TODO handle file uploads and return their paths
         */
        $idfront = ($request->hasFile('idfront'))? $request->file('idfront')->store('public/uploads'):'';
        $idback = ($request->hasFile('idback'))? $request->file('idback')->store('public/uploads'):'';
        $passport=($request->hasFile('passport'))? $request->file('passport')->store('public/uploads'):'';
        $contractform=($request->hasFile('passport'))? $request->file('contractform')->store('public/uploads'):'';
        $farmer=Farmers::create([
            'sirname'=>$request->sirName,
            'firstname'=>$request->firstName,
            'lastname'=>$request->lastName,
            'idnumber'=>$request->idnumber,
            'mobilenumber'=>$request->mobilenumber,
            'contractform'=>$contractform,
            'passport'=>$passport,
            'idfront'=>$idfront,
            'idback'=>$idback,
            'email'=>$request->email,
            'farmerscode'=>$request->farmerscode
        ])->id;
        if($farmer){
            $error=false;
            if(!Account::create([
                'idnumber'=>$request->idnumber,
                'paymentoption'=>$request->paymentoption,
                'accountname'=>$request->accountName,
                'bank'=>$request->bank,
                'accountnumber'=>$request->accountNumber
            ])){
                $error=true;
            }
            if(!Farm::create([
                'farmer_id'=>$farmer,
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
                $error=true;
            };
            if(!$error){
                return back()->with('status','Farmer added successfully');
            }else{
                return back()->with('status','An Error Occurred');
            }
        }
    }

    public function upload(Request $request)
    {
        $farmer=$request->farmerid;
        $record=Farmers::find($farmer);
        if($request->hasFile('idfront')){
            $idfront=$request->file('idfront')->store('public/uploads');
            $record->idfront=$idfront;
        }
        if($request->hasFile('idback')){
            $idback=$request->file('idback')->store('public/uploads');
            $record->idback=$idback;
        }

        if($request->hasFile('passport')){
            $passport=$request->file('passport')->store('public/uploads');
            $record->passport=$passport;
        }
        if($request->hasFile('contractform')){
            $contractform=$request->file('contractform')->store('public/uploads');
            $record->contractform=$contractform;
        }
        if($record->save()){
            return back()->with('status','Updated Successfully');
        }else{
            return back()->with('status','An error occurred');
        }
    }

    public function view($id)
    {
        if(Auth::user()->hasAnyRole(['ROLE_AGRONOMIST','ROLE_ADMIN'])) {
            $farmer=Farmers::findOrFail($id);
            $passport=Storage::url($farmer->passport);
            $idback=Storage::url($farmer->idback);
            $idfront=Storage::url($farmer->idfront);
            $contractform=Storage::url($farmer->contractform);
            $imgs=['passport'=>$passport,'idback'=>$idback,'idfront'=>$idfront,'contract'=>$contractform];
            $account=Account::where('idnumber',$farmer->idnumber)->get();
            $farms=Farm::where('farmer_id',$farmer->id)->get();
            echo json_encode(['farmer'=>$farmer,'imgs'=>$imgs,'account'=>$account,'farms'=>$farms]);
        }else{
            abort(403,'Unauthorised Action');
        }
    }
}
