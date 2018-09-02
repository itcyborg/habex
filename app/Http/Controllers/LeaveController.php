<?php

namespace App\Http\Controllers;

use App\leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function request(Request $request)
    {
        $start=$request->start;
        $end=$request->end;
        $startdate=date_create($start);
        $enddate=date_create($end);
        $existing=leave::where('employeeid',Auth::user()->id)->where('year',(int) $startdate->format('Y'))->get()->sum('days');
        $days = date_diff($startdate, $enddate)->d;
        if($existing<=21) {
            if(($existing+$days)<=21) {
                $leave = new leave;
                $leave->type = $request->type;
                $leave->employeeid = Auth::user()->id;
                $leave->days = $days;
                $leave->end = $request->end;
                $leave->year = (int)$startdate->format('Y');
                $leave->start = $request->start;
                $leave->description = $request->description;
                if($leave->save()){
                    return back()->with('status',true)->with('msg','Request made successfully and is waiting for approval');
                }
            }else{
                return back()->with('msg','You are left with '.(21-$existing).' leave days which is less than '.$days. ' days requested')->with('status',false);
            }
        }else {
            return back()->with('msg', 'You do not have any leave days available.')->with('status',false);
        }
    }
}
