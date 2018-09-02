<?php

namespace App\Http\Controllers;

use App\Account;
use App\Agronomists;
use App\Farm;
use App\Farmers;
use App\leave;
use App\Mail\registration;
use App\Order;
use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    use ResetsPasswords;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_ADMIN');
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function agronomistForm()
    {
        $counties=DB::table('counties')
            ->get();
        return view('admin.addAgronomist',['counties'=>$counties]);
    }

    public function viewAgronomists()
    {
        return view('admin.viewAgronomists',['agronomists'=>Agronomists::all()]);
    }

    public function farmerForm()
    {
        $counties=DB::table('counties')
            ->get();
        return view('admin.addFarmer',['counties'=>$counties]);
    }

    public function viewFarmers()
    {
        $counties=DB::table('counties')
            ->get();
        return view('admin.viewFarmers',['farmers'=>Farmers::all(),'counties'=>$counties]);
    }

    public function orderForm()
    {
        return view('admin.newOrder',['farmers'=>Farmers::all(['id','firstname','sirname','idnumber'])]);
    }

    public function viewOrders()
    {
        return view('admin.listOrders',
            ['orders'=>Order::all()->unique('orderNo')]);
    }

    public function add(Request $request)
    {
        $this->validate($request,[
            'sirname'=>'required',
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|unique:agronomists',
            'idnumber'=>'required|unique:agronomists',
            'mobilenumber'=>'required|unique:agronomists',
            'position'=>'required',
            'zone'=>'required',
            'accountname'=>'required',
            'accountnumber'=>'required',
            'branchname'=>'required',
            'bankname'=>'required'
        ]);
        $agronomist=new Agronomists();
        $agronomist->sirname=$request->sirname;
        $agronomist->firstname=$request->firstname;
        $agronomist->lastname=$request->lastname;
        $agronomist->position=$request->position;
        $agronomist->zone=$request->zone;
        $agronomist->email=$request->email;
        $agronomist->idnumber=$request->idnumber;
        $agronomist->mobilenumber=$request->mobilenumber;
        if($agronomist->save()){
            $account=new Account;
            $account->idnumber=$agronomist->idnumber;
            $account->paymentoption='bank';
            $account->accountname=$request->accountname;
            $account->accountnumber=$request->accountnumber;
            $account->bank=$request->bankname;
            $account->branch=$request->branchname;
            $account->userType='Agronomist';
            $account->save();
            $password=str_random(8);
            $id=User::create([
                'name'=>$request->sirname.rand(0,10),
                'email'=>$request->email,
                'password'=>Hash::make($password)
            ])->id;
            DB::table('role_user')->insert(['role_id'=>2,'user_id'=>$id]);
            /**
             * TODO Send Email WITH ACCOUNT DETAILS
             */
            $user=['name'=>$request->sirname,'email'=>$request->email,'password'=>$password];
            Mail::to($request->email)->send(new registration($user));
            return back()->with('Success');
        }
    }

    public function cropInfo()
    {
        return view('admin.cropinfo',['farmers'=>Farmers::all()]);
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

    public function deleteFarmer($id)
    {
        $farmer=Farmers::find($id);
        if(!$farmer){
            return json_encode(['status' => false]);
        }
        try {
            if ($farmer->delete()) {
                return json_encode(['status' => true]);
            } else {
                return json_encode(['status' => false]);
            }
        } catch (\Exception $e) {
            return json_encode(['status' => false]);
        }

    }

    public function reset($id)
    {
        $agronomist=Agronomists::find($id);
        if($agronomist){
            $user=User::where('email',$agronomist->email)->first();
            if($user){
                return $this->broker()->sendResetLink(['email'=>$user->email]);
            }
        }
    }

    public function deleteAgronomist($id)
    {
        $agronomist=Agronomists::find($id);
        if($agronomist){
            $user=User::where('email',$agronomist->email)->first();
            if($user){
                $user->delete();
            }
            $agronomist->delete();
        }
        dd($user);
    }

    public function leave()
    {
        $leave=DB::table('leaves')
            ->join('users','leaves.employeeid','users.id')
            ->join('agronomists','agronomists.email','users.email')
            ->select('leaves.*','users.email','agronomists.sirname','agronomists.firstname','agronomists.lastname',
                'agronomists.idnumber','agronomists.mobilenumber','agronomists.zone','agronomists.position')
            ->get();
        $employees=DB::table('agronomists')
            ->join('users','users.email','agronomists.email')
            ->select('agronomists.id','agronomists.sirname','agronomists.firstname','agronomists.lastname','agronomists.idnumber')
            ->get();
        return view('admin.leave',['leaves'=>$leave,'employees'=>$employees]);
    }

    public function leaveSearch($id)
    {
        $startdate=date_create(date('Y-m-d',time()));
        $year=(int) $startdate->format('Y');
        $leave=leave::where('employeeid',$id)
            ->where('year',$year)
            ->where('status','!=','Pending')
            ->where('status','=','Approved')
            ->get()
            ->sum('days');
        $employee=Agronomists::find($id);
        $leaves=['all'=>21,'used'=>$leave,'remaining'=>21-$leave,'employee'=>$employee];
        return $leaves;
    }
}
