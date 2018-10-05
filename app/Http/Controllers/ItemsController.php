<?php

namespace App\Http\Controllers;

use App\items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_ADMIN');
    }

    public function addItem()
    {
        return view('admin.addItem');
    }

    public function listItems()
    {
        $items=items::all()->reverse();
        return view('admin.viewItem',['items'=>$items]);
    }

    public function storeItem(Request $request)
    {
        $this->validate($request,[
            'item'=>'required|unique:items,item',
            'unitcost'=>'required',
            'tax'=>'required',
            'description'=>'required'
        ]);
        $item=new items();
        $item->item=$request->item;
        $item->description=$request->description;
        $item->tax=$request->tax;
        $item->unitcost=$request->unitcost;
        $item->updatedBy=Auth::user()->id;
        if($item->save()){
            return redirect()->back();
        }else{
            return redirect()->back()->with('error','An Error Occurred');
        }
    }

    public function getItems(Request $request)
    {
        $items=items::all();
        return json_encode($items);
    }
}
