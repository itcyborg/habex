<?php

namespace App\Http\Controllers;

use App\Agronomists;
use App\Farmers;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

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
            ->join('subcounties','subcounties.county_id','counties.id')
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
        return view('admin.viewFarmers',['farmers'=>Farmers::all()]);
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
            'paymentoption'=>'required',
            'accountname'=>'required',
            'accountnumber'=>'required'
        ]);
        $agronomist=new Agronomists();
        $agronomist->sirname=$request->sirname;
        $agronomist->firstname=$request->firstname;
        $agronomist->lastname=$request->lastname;
        $agronomist->email=$request->email;
        $agronomist->idnumber=$request->idnumber;
        $agronomist->mobilenumber=$request->mobilenumber;
        if($agronomist->save()){
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
}
