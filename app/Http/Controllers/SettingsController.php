<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
