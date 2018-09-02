<?php

namespace App\Http\Controllers;

use App\Account;
use App\Farm;
use App\Farmers;
use Illuminate\Http\Request;

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

        /**
         * file uploads
         * TODO handle file uploads and return their paths
         */
        $idfront=$request->file('idfront')->store('uploads');
        $idback=$request->file('idback')->store('uploads');
        $passport=$request->file('passport')->store('uploads');
        $contractform=$request->file('contractform')->store('uploads');
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
            'email'=>$request->email
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
            $idfront=$request->file('idfront')->store('uploads');
            $record->idfront=$idfront;
        }
        if($request->hasFile('idback')){
            $idback=$request->file('idback')->store('uploads');
            $record->idback=$idback;
        }

        if($request->hasFile('passport')){
            $passport=$request->file('passport')->store('uploads');
            $record->passport=$passport;
        }
        if($request->hasFile('contractform')){
            $contractform=$request->file('contractform')->store('uploads');
            $record->contractform=$contractform;
        }
        if($record->save()){
            return back()->with('status','Updated Successfully');
        }else{
            return back()->with('status','An error occurred');
        }
    }
}
