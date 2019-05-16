<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function newOrder(Request $request)
    {
        $errors=false;
        $orderno=str_shuffle(mt_rand(100000,999999));
        foreach ($request->items as $key=>$item) {
            $order=new Order;
            $order->orderNo=$orderno;
            $order->farmerId=$request->farmer;
            $order->dueDate=$request->duedate;
            $order->unitCost=$item['unitCost'];
            $order->description=$item['item'];
            $order->quantity=$item['quantity'];
            $order->tax=$item['tax'];
            $order->discount=($item['discount']!==null && $item['discount']>0)?$item['discount']:0;
            $order->itemNo=$key;
            $order->updatedBy=Auth::user()->id;
            $order->total=$order->quantity*$order->unitCost;
            if(!$order->save()){
                $errors=true;
            }
        }
        if(!$errors) {
            NotificationController::newOrder($orderno);
            return json_encode(['status'=>200]);
        }else{
            return json_encode(['status'=>500,'msg'=>'An error occurred']);
        }
    }

    public function view($id)
    {
        $orders = DB::table('orders')->where('orderNo', $id)
            ->join('farmers','orders.farmerId','farmers.id')
            ->get();
        return $orders;
    }

    public function getSalesInfo($id)
    {
        $agronomist=DB::table('orders')->where('orderNo',$id)
            ->leftJoin('users','orders.updatedBy','users.id')
            ->leftJoin('agronomists','users.email','agronomists.email')
            ->select('agronomists.email','agronomists.sirname','agronomists.firstname','agronomists.lastname','agronomists.mobilenumber')
            ->get();
        return $agronomist;
    }
}
