<?php

namespace App\Http\Controllers;

use App\Account;
use App\Agronomists;
use App\Farm;
use App\Farmers;
use App\leave;
use App\Mail\registration;
use App\Order;
use App\Scouting;
use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use function MongoDB\BSON\toJSON;
use App\Role;

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
        $counties = DB::table('counties')
            ->get();
        return view('admin.addAgronomist', ['counties' => $counties]);
    }

    public function viewAgronomists()
    {
        return view('admin.viewAgronomists', ['agronomists' => Agronomists::all()]);
    }

    public function farmerForm()
    {
        $counties = DB::table('counties')
            ->get();
        return view('admin.addFarmer', ['counties' => $counties]);
    }

    public function viewFarmers()
    {
        $counties = DB::table('counties')
            ->get();
        return view('admin.viewFarmers', ['farmers' => Farmers::all(), 'counties' => $counties]);
    }

    public function orderForm()
    {
        return view('admin.newOrder', ['farmers' => Farmers::all(['id', 'firstname', 'sirname', 'idnumber'])]);
    }

    public function viewOrders()
    {
        return view(
            'admin.listOrders',
            ['orders' => Order::all()->unique('orderNo')]
        );
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'sirname' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:agronomists',
            'idnumber' => 'required|unique:agronomists',
            'mobilenumber' => 'required|unique:agronomists',
            'position' => 'required',
            'zone' => 'required',
            'accountname' => 'required',
            'accountnumber' => 'required',
            'branchname' => 'required',
            'bankname' => 'required'
        ]);
        $agronomist = new Agronomists();
        $agronomist->sirname = $request->sirname;
        $agronomist->firstname = $request->firstname;
        $agronomist->lastname = $request->lastname;
        $agronomist->position = $request->position;
        $agronomist->zone = $request->zone;
        $agronomist->email = $request->email;
        $agronomist->idnumber = $request->idnumber;
        $agronomist->mobilenumber = $request->mobilenumber;
        if ($agronomist->save()) {
            $account = new Account;
            $account->idnumber = $agronomist->idnumber;
            $account->paymentoption = 'bank';
            $account->accountname = $request->accountname;
            $account->accountnumber = $request->accountnumber;
            $account->bank = $request->bankname;
            $account->branch = $request->branchname;
            $account->userType = 'Agronomist';
            $account->save();
            $password = str_random(8);
            $id = User::create([
                'name' => $request->sirname . rand(0, 10),
                'email' => $request->email,
                'password' => Hash::make($password)
            ])->id;
            DB::table('role_user')->insert(['role_id' => 2, 'user_id' => $id]);
            /**
             * Send Email WITH ACCOUNT DETAILS
             */
            $user = ['name' => $request->sirname, 'email' => $request->email, 'password' => $password];
            Mail::to($request->email)->send(new registration($user));
            return back()->with('Success');
        }
    }

    public function cropInfo()
    {
        return view('admin.cropinfo', ['farmers' => Farmers::all()]);
    }

    public function search(Request $request)
    {
        $farmer = Farmers::find($request->farmer);
        $farms = Farm::where('farmer_id', $request->farmer)
            ->get();
        $data = [];
        $key = 0;
        foreach ($farms->toArray() as $farm => $value) {
            $count = Scouting::where('farmid', '=', $value['id'])->count();
            $tmp['scoutingsDone'] = $count;
//            $data=array_merge($farms->toArray(),$data);
            $value = array_add($value, 'scoutingsDone', $count);
            $data[$key] = $value;
            $key++;
        }
        return ['farmer' => $farmer, 'farms' => $data, 'key' => $data];
    }

    public function addFarm(Request $request)
    {
        if (Farm::create([
            'farmer_id' => $request->farmerid,
            'county' => $request->county,
            'constituency' => $request->constituency,
            'ward' => $request->ward,
            'location' => $request->location,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'elevation' => $request->elevation,
            'seedlingsPlanted' => $request->numberplanted,
            'farmSize' => $request->farmsize
        ])) {
            return back()->with('status', 'Farm added successfully');
        }
    }

    public function deleteFarmer($id)
    {
        $farmer = Farmers::find($id);
        if (!$farmer) {
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
        $agronomist = Agronomists::find($id);
        if ($agronomist) {
            $user = User::where('email', $agronomist->email)->first();
            if ($user) {
                return $this->broker()->sendResetLink(['email' => $user->email]);
            }
        }
    }

    public function deleteAgronomist($id)
    {
        $agronomist = Agronomists::find($id);
        if ($agronomist) {
            $user = User::where('email', $agronomist->email)->first();
            if ($user) {
                $user->delete();
            }
            $agronomist->delete();
        }
        dd($user);
    }

    public function leave()
    {
        $leave = DB::table('leaves')
            ->join('users', 'leaves.employeeid', 'users.id')
            ->join('agronomists', 'agronomists.email', 'users.email')
            ->select(
                'leaves.*',
                'users.email',
                'agronomists.sirname',
                'agronomists.firstname',
                'agronomists.lastname',
                'agronomists.idnumber',
                'agronomists.mobilenumber',
                'agronomists.zone',
                'agronomists.position'
            )
            ->get();
        $employees = DB::table('agronomists')
            ->join('users', 'users.email', 'agronomists.email')
            ->select('agronomists.id', 'agronomists.sirname', 'agronomists.firstname', 'agronomists.lastname', 'agronomists.idnumber')
            ->get();
        return view('admin.leave', ['leaves' => $leave, 'employees' => $employees]);
    }

    public function leaveSearch($id)
    {
        $startdate = date_create(date('Y-m-d', time()));
        $year = (int)$startdate->format('Y');
        $leave = leave::where('employeeid', $id)
            ->where('year', $year)
            ->where('status', '!=', 'Pending')
            ->where('status', '=', 'Approved')
            ->get()
            ->sum('days');
        $employee = Agronomists::find($id);
        $leaves = ['all' => 21, 'used' => $leave, 'remaining' => 21 - $leave, 'employee' => $employee];
        return $leaves;
    }

    public function employees()
    {
        return json_encode(Agronomists::all());
    }

    public function employeesSalaries(Request $request)
    {
        $id = $request->id;
        $employees = DB::table('agronomists')
            ->where('agronomists.id', '=', $id)
            ->leftJoin('salaries', 'agronomists.id', 'salaries.employeeid')
            ->select('agronomists.idnumber', 'agronomists.position', 'agronomists.zone', 'salaries.jobGroup', 'salaries.basicSalary', 'updatedby', 'agronomists.id')
            ->get();
        return json_encode($employees);
    }

    public function updateInfo()
    {
        $counties = DB::table('counties')
            ->get();
        return view('admin.updateInfo', ['counties' => $counties]);
    }

    public function updateDetails(Request $request)
    {
        $this->validate($request, [
            'sirname' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'idnumber' => 'required|unique:agronomists',
            'mobilenumber' => 'required|unique:agronomists',
            'position' => 'required',
            'zone' => 'required',
            'accountname' => 'required',
            'accountnumber' => 'required',
            'branchname' => 'required',
            'bankname' => 'required'
        ]);
        $agronomist = new Agronomists();
        $agronomist->sirname = $request->sirname;
        $agronomist->firstname = $request->firstname;
        $agronomist->lastname = $request->lastname;
        $agronomist->position = $request->position;
        $agronomist->zone = $request->zone;
        $agronomist->email = Auth::user()->email;
        $agronomist->idnumber = $request->idnumber;
        $agronomist->mobilenumber = $request->mobilenumber;
        if ($agronomist->save()) {
            $account = new Account;
            $account->idnumber = $agronomist->idnumber;
            $account->paymentoption = 'bank';
            $account->accountname = $request->accountname;
            $account->accountnumber = $request->accountnumber;
            $account->bank = $request->bankname;
            $account->branch = $request->branchname;
            $account->userType = 'Admin';
            $account->save();
            return back()->with('Success');
        }
    }

    public function checkRole(Request $request)
    {
        $agronomistid = Agronomists::where('id', '=', $request->id)->first()->email;
        $userid = User::where('email', $agronomistid)->first()->id;
        $roles = DB::table('role_user')
            ->where('role_user.user_id', $userid)
            ->leftJoin('roles', 'role_user.role_id', 'roles.id')
            ->select('roles.id', 'roles.name')
            ->get();
        return $roles->toJson();
    }

    public function updateRole(Request $request)
    {
        if(Auth::user()->hasRole('ROLE_ADMIN')){
            $role=$request->role;
            $agronomistid=$request->agronomist_id;
            $agronomistemail = Agronomists::where('id', '=', $agronomistid)->first()->email;
            $userid = User::where('email', $agronomistemail)->first()->id;
            $user=User::find($userid);
            $roles=$user->roles()->get();
            $rolesArray=[];
            foreach($roles as $userRole){
                $rolesArray[$userRole->id]=$userRole->name;
            }
            if($role==='ROLE_ADMIN'){
                $this->removeRoles($user->id, $rolesArray);
                $this->addRoles($user->id, $role);
            }
            if($role==='ROLE_VIEW'){
                $this->removeRoles($user->id, $rolesArray);
                $this->addRoles($user->id, $role);
            }
            if($role==='ROLE_AGRONOMIST'){
                $this->removeRoles($user->id, $rolesArray);
                $this->addRoles($user->id, $role);
            }
            if($role==='ROLE_LEAD_AGRONOMIST'){
                $this->removeRoles($user->id, $rolesArray);
                $this->addRoles($user->id, $role);
            }
            if($role==='ROLE_NURSERY'){
                $this->removeRoles($user->id, $rolesArray);
                $this->addRoles($user->id, $role);
            }
            if($role==='ROLE_FINANCE'){
                $this->removeRoles($user->id, $rolesArray);
                $this->addRoles($user->id, $role);
            }
        }else{
            abort(400);
        }
    }
    private function removeRoles($user, $roles){
        $roleIDs=array_keys($roles);
        try{
            DB::transaction(function () use ($roleIDs,$user){
                foreach ($roleIDs as $roleID){
                    DB::table('role_user')
                        ->where([
                            ['role_id','=',$roleID],
                            ['user_id','=',$user]
                        ])->delete();
                }
            });
            return true;
        }catch (\Throwable $e){
            return false;
        }
    }

    private function addRoles($user, $role){
        $rolesIDs=[];
        if($role==='ROLE_ADMIN'){
            $rolesIDs[]=Role::where('name','=',$role)->first()->id;
        }
        if($role==='ROLE_VIEW'){
            $rolesIDs[]=Role::where('name','=','ROLE_ADMIN')->first()->id;
            $rolesIDs[]=Role::where('name','=',$role)->first()->id;
        }
        if($role==='ROLE_AGRONOMIST'){
            $rolesIDs[]=Role::where('name','=',$role)->first()->id;
        }
        if($role==='ROLE_LEAD_AGRONOMIST'){
            $rolesIDs[]=Role::where('name','=','ROLE_LEAD_AGRONOMIST')->first()->id;
            $rolesIDs[]=Role::where('name','=',$role)->first()->id;
        }
        if($role==='ROLE_NURSERY'){
            $rolesIDs[]=Role::where('name','=','ROLE_LEAD_AGRONOMIST')->first()->id;
            $rolesIDs[]=Role::where('name','=',$role)->first()->id;
        }
        if($role==='ROLE_FINANCE'){
            $rolesIDs[]=Role::where('name','=',$role)->first()->id;
        }
        try {
            DB::transaction(function () use ($rolesIDs, $user) {
                foreach ($rolesIDs as $rolesID) {
                    DB::table('role_user')->insert(['role_id' => $rolesID, 'user_id' => $user]);
                }
            });
            return true;
        }catch (\Throwable $e){
            return false;
        }
    }

    public function approveLeave(Request $request, $id)
    {
        if($request->action==='approve'){
            $leave=leave::where('id',$id)->first();
            $leave->status='Approved';
            $leave->comments=$request->comment;
            $leave->approverid=Auth::user()->id;
            if($leave->save()) {
                return json_encode(['status'=>true]);
            }else{
                return json_encode(['status'=>false]);
            }
        }
        if($request->action==='decline'){
            $leave=leave::where('id',$id)->first();
            $leave->status='Rejected';
            $leave->comments=$request->comment;
            $leave->approverid=Auth::user()->id;
            if($leave->save()) {
                return json_encode(['status'=>true]);
            }else{
                return json_encode(['status'=>false]);
            }
        }
    }
}
