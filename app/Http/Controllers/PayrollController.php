<?php

namespace App\Http\Controllers;

use App\Allowance;
use App\Deduction;
use App\Payslip;
use App\salary;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        ## track the saving process
        $saved=[
            'PAYSLIP'=>[
                'status'=>false,
                'id'=>null
            ],
            'ALLOWANCES'=>[
                'status'=>false,
                'ids'=>[]
            ],
            'DEDUCTIONS'=>[
                'status'=>false,
                'ids'=>[]
            ]
        ];

        $payslip=new Payslip;
        $payslip->employeeid=$employeeid;
        $payslip->basicSalary=$basic;
        $payslip->month=$month;
        $payslip->year=$year;
        $payslip->totalAllowances=$totalallowances;
        $payslip->totalTaxableAllowances=$totalallowancestax;
        $payslip->totalDeductions=$totaldeductions;
        $payslip->grossSalary=$gross;
        $payslip->netSalary=$net;
        $payslip->status=0;
        $payslip->updatedby=Auth::user()->id;
        try {
            if ($payslip->save()) {
                $saved['PAYSLIP']['status'] = true;
                $saved['PAYSLIP']['id'] = $payslip->id;

                $allowancestosave = count($allowances);
                foreach ($allowances as $allowance) {
                    if (($allowance['type']) && ($allowance['percentage'] || $allowance['amount'])) {
                        if ($allowance['percentage'] > 0) {
                            $allowance['amount'] = $allowance['percentage'] * $basic / 100;
                        }
                        $dballowance = new Allowance;
                        $dballowance->payslipid = $saved['PAYSLIP']['id'];
                        $dballowance->name = $allowance['type'];
                        $dballowance->percent = $allowance['percentage'];
                        $dballowance->amount = $allowance['amount'];
                        $dballowance->fixed = ($allowance['fixed'] === 'true') ? 1 : 0;
                        $dballowance->taxable = ($allowance['taxable'] === 'true') ? 1 : 0;
                        if ($dballowance->save()) {
                            $saved['ALLOWANCES']['status'] = true;
                            $saved['ALLOWANCES']['ids'][] = $dballowance->id;
                        }
                    }
                }

                $deductionstosave = count($deductions);
                foreach ($deductions as $deduction) {
                    if (($deduction['type']) && ($deduction['percentage'] || $deduction['amount'])) {
                        if ($deduction['percentage'] > 0) {
                            $deduction['amount'] = $deduction['percentage'] * $taxable / 100;
                        }
                        $dbdeduction = new Deduction;
                        $dbdeduction->payslipid = $saved['PAYSLIP']['id'];
                        $dbdeduction->name = $deduction['type'];
                        $dbdeduction->percent = $deduction['percentage'];
                        $dbdeduction->amount = $deduction['amount'];
                        $dbdeduction->fixed = ($deduction['fixed'] === 'true') ? 1 : 0;
                        if ($dbdeduction->save()) {
                            $saved['DEDUCTIONS']['ids'][] = $dbdeduction->id;
                        }
                    }
                }

                if (count($saved['ALLOWANCES']['ids']) === $allowancestosave) {
                    $saved['ALLOWANCES']['status'] = true;
                } else {
                    $saved['ALLOWANCES']['status'] = false;
                }
                if (count($saved['DEDUCTIONS']['ids']) === $deductionstosave) {
                    $saved['DEDUCTIONS']['status'] = true;
                } else {
                    $saved['DEDUCTIONS']['status'] = false;
                }
            } else {
                // return failed message
                return 'Failed at Payslip';
            }
        }catch (QueryException $e){
            Deduction::destroy($saved['DEDUCTIONS']['ids']);
            Allowance::destroy($saved['ALLOWANCES']['ids']);
            Payslip::destroy($saved['PAYSLIP']['id']);

            // return error message
            return 'Failed and rolled back changes';
        }

        /** check if all the records have been successfully entered
         *  delete all the inserted records if an error occurred
         **/

        if($saved['PAYSLIP']['status']&&$saved['ALLOWANCES']['status']&&$saved['DEDUCTIONS']['status']){
            // return success message
            return 'Success to all';
        }else{
            Deduction::destroy($saved['DEDUCTIONS']['ids']);
            Allowance::destroy($saved['ALLOWANCES']['ids']);
            Payslip::destroy($saved['PAYSLIP']['id']);

            // return error message
            return 'Failed and rolled back changes';
        }
    }

    public function all()
    {
        $payroll=DB::table('payslips')
            ->join('agronomists','agronomists.id','payslips.employeeid')
            ->select('payslips.*','agronomists.sirname','agronomists.firstname','agronomists.lastname')
            ->get();
        return view('admin.viewPayroll',['payslips'=>$payroll]);
    }

    public function delete($id)
    {
        $payslip=Payslip::findOrFail($id);
        $status=['status'=>false,'msg'=>'An error occurred'];
        if($payslip->status===1){
            $status['msg']='You are not allowed to delete this record';
            return json_encode($status);
        }

        if($payslip->delete()){
            $status['status']=true;
            $status['msg']='Payslip has been successfully deleted';
        }
        return json_encode($status);
    }

    public function process($id)
    {
        /**
         * codes for response (non-standard)
         * 1001: 25 days not elapsed
         * 1002: An error occurred processing payslip
         * 2000: no error
         */
        DB::enableQueryLog();
        $payslip=Payslip::findOrFail($id);
        $today=Carbon::now();
        $start=$today->subDays(25);
        $today=Carbon::now();
        $msg='';
        $code=null;
        $status=false;
        $previous=Payslip::whereBetween('updated_at',[$start->toDateString(),$today->toDateString()])->where('employeeid',$payslip->employeeid)->get();
        if($previous->count()>0){
            $msg='Payslip cannot be processed at this time. 25 days has to elapse since the last payroll for the specified employee was processed.';
            $code=1001;
            $status=false;
            return json_encode(['status'=>$status,'msg'=>$msg,'code'=>$code]);
        }
        if($payslip->status==1){
            $msg='Payslip has already been processed for the named employee';
            $code=1002;
            return json_encode(['status'=>$status,'msg'=>$msg,'code'=>$code]);
        }
        $payslip->status=1;
        if($payslip->save()){
            $msg='Payslip has been processed successfully';
            $code=2000;
            $status=true;
        }else{
            $msg='An error occurred. Please try again after sometime. If problem persists contact the Admin';
            $code=1002;
            $status=false;
        }
        return json_encode(['status'=>$status,'msg'=>$msg,'code'=>$code]);
    }
}
