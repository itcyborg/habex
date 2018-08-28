<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->roles()->first()->name==='ROLE_ADMIN'){
            return redirect('admin');
        }else if(Auth::user()->roles()->first()->name==='ROLE_AGRONOMIST'){
            return redirect('agronomist');
        }else{
            abort(401,'Not Authorised');
        }
    }

    public function counties(Request $request)
    {
        $counties=DB::table('counties')->join('subcounties','subcounties.county_id','counties.id')->get();
        $count_tmp=[];
        foreach ($counties as $county) {
            $count_tmp[$county->county_name][] = $county;
        }
        return json_encode(['counties'=>$count_tmp]);
    }

    public function wards(Request $request)
    {
        $countyid=DB::table('counties')->where(['county_name'=>$request->county])->get()[0]->id;
        return DB::table('subcounties')->where(['name'=>$request->subcounty,'county_id'=>$countyid])->get();
    }
}
