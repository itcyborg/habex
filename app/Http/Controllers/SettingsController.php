<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(auth()->user()->hasAnyRole(['ROLE_ADMIN'])){
            return view('admin.settings');
        }elseif(auth()->user()->hasAnyRole(['ROLE_AGRONOMIST'])){
            return view('agronomist.settings');
        }
        return abort(404);
    }

    public function changePass(Request $request)
    {
        $this->validate($request,[
            'id'        =>  'required',
            'current'   =>  'required',
            'new'       =>  'required',
            'confirm'   =>  'required'
        ]);
        $user=User::findOrFail($request->id);
        if($request->new!==$request->confirm){
            return;
        }
        if(Hash::check($request->current,$user->password)){
            $user->password=Hash::make($request->new);
            return print_r($user->save());
        }else{
            return 'Wrong Password';
        }
    }
}
