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
//        return $request->all();
//        return ($request->hasFile('passport'))?'yes':'false';
        $farmer=$request->farmerid;
        $record=Farmers::find($farmer);
//        return $request->all();
        if($request->input('idfront')){
            $image = $request->input('idfront');
            $imageName = 'public/uploads/image_' . time() . '.jpg';
            Storage::put($imageName,base64_decode($image),'public');
            $idfront=str_replace('public/','',$imageName);
            $record->idfront=$idfront;
        }
        if($request->input('idback')){
            $image = $request->input('idback');
            $imageName = 'public/uploads/image_' . time() . '.jpg';
            Storage::put($imageName,base64_decode($image),'public');
            $idback=str_replace('public/','',$imageName);
            $record->idback=$idback;
        }

        if($request->input('passport')){
            $image = $request->input('passport');
            $imageName = 'public/uploads/image_' . time() . '.jpg';
            Storage::put($imageName,base64_decode($image),'public');
            $passport=str_replace('public/','',$imageName);
            $record->passport=$passport;
        }
        if($request->input('contractform')){
            $image = $request->input('contractform');
            $imageName = 'public/uploads/image_' . time() . '.jpg';
            Storage::put($imageName,base64_decode($image),'public');
            $contractform=str_replace('public/','',$imageName);
            $record->contractform=$contractform;
        }
        if($record->save()){
            return $record;
            return 'success';
        }else{
            return 'failed';
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
            $account=Account::where('idnumber',$farmer->idnumber)->first();
            $farms=Farm::where('farmer_id',$farmer->id)->get();
            echo json_encode(['farmer'=>$farmer,'imgs'=>$imgs,'account'=>$account,'farms'=>$farms]);
        }else{
            abort(403,'Unauthorised Action');
        }
    }

    public function updateAccount(Request $request)
    {
        $account=null;
        if(Account::where('idnumber',$request->id)->exists()){
            $account=Account::where('idnumber')->get();
            $account->accountname=$request->accountname;
            $account->accountnumber=$request->accountnumber;
            $account->paymentoption=$request->paymentmode;
            $account->branch=$request->branchname;
            $account->bank=$request->bankname;
        }else{
            $account=new Account;
            $account->accountname=$request->accountname;
            $account->accountnumber=$request->accountnumber;
            $account->paymentoption=$request->paymentmode;
            $account->branch=$request->branchname;
            $account->bank=$request->bankname;
            $account->idnumber=$request->id;
        }
        if($account->save()){
            return json_encode(['status'=>200,'msg'=>'Details Updated Successfully']);
        }else{
            return json_encode(['status'=>400,'msg'=>'Details Failed to Update']);
        }
    }
}
