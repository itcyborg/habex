<?php

namespace App\Http\Controllers;

use App\Agronomists;
use App\Http\Requests\SalaryRequest;
use App\salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_ADMIN');
    }

    //
    public function index()
    {
        $employees=Agronomists::all();
        return view('admin.salary',['employees'=>$employees]);
    }

    public function save(SalaryRequest $request)
    {
        $this->validate($request,[
            'employee'=>'required|unique:salaries,employeeid',
            'idnumber'=>'required|unique:salaries,idnumber',
            'jobgroup'=>'required',
            'salary'=>'required'
        ]);
        $salary=new salary;
        $salary->employeeid=$request->employee;
        $salary->idnumber=$request->idnumber;
        $salary->jobGroup=$request->jobgroup;
        $salary->basicSalary=$request->salary;
        $salary->updatedby=Auth::user()->id;
        if($salary->save()){
            return redirect()->back()->with('success','Salary updated successfully');
        }

        return redirect()->back()->with('errors','An error occurred');
        dd($request->all());
    }

    public function employees()
    {
        $employees=Agronomists::all('id','idnumber');
        return $employees;
    }
}
