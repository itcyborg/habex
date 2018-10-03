<?php

namespace App\Http\Controllers;

use App\salary;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add(Request $request)
    {
        // TODO:verify the data


        $employeeid=$request->employeeid;
        $month=$request->month;
        $year=$request->year;
        $allowances=$request->allowances;
        $deductions=$request->deductions;
        $totalallowances=0;
        $totalallowancestax=0;
        $totaldeductions=0;
        $basic=salary::where('employeeid','=',$employeeid)->first()->basicSalary;
        $taxable=0;

        //calculate total allowances
        foreach ($allowances as $allowance) {
            if(($allowance['type']) && ($allowance['percentage'] || $allowance['amount'])){
                if($allowance['percentage']>0){
                    if($allowance['taxable']=='true') {
                        $totalallowancestax += $allowance['percentage'] * $basic / 100;
                    }else{
                        $totalallowances += $allowance['percentage'] * $basic / 100;
                    }
                }elseif($allowance['amount']>0 && $allowance['percentage']==null){
                    if($allowance['taxable']) {
                        $totalallowancestax += $allowance['amount'];
                    }else{
                        $totalallowances+=$allowance['amount'];
                    }
                }
            }
        }

        //calculate the total taxable income
        $taxable=$basic+$totalallowancestax;

        //calculate total deductions
        foreach ($deductions as $deduction) {
            if(($deduction['type'])&&($deduction['percentage'] || $deduction['amount'])){
                if($deduction['percentage']>0){
                    $totaldeductions+=$deduction['percentage']*$taxable/100;
                }elseif($deduction['fixed']==='true'){
                    $totaldeductions+=$deduction['amount'];
                }
            }
        }

        // calculate the gross, net
        $gross=$basic+$totalallowancestax;
        $net=$gross-$totaldeductions+$totalallowances;

        //TODO:save the data

    }
}
