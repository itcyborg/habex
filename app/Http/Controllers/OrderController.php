<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function newOrder(Request $request)
    {
        $orderno=str_shuffle(mt_rand(100000,999999));
        foreach ($request->items as $key=>$item) {
            $order=new Order;
            $order->orderNo=$orderno;
            $order->farmerId=1;
            $order->dueDate=$request->duedate;
            $order->unitCost=$item['unitCost'];
            $order->description=$item['item'];
            $order->quantity=$item['quantity'];
            $order->tax=$item['vat'];
            $order->itemNo=$key;
            $order->total=$order->quantity*$order->unitCost;
            $order->save();
        }
        dd($request->all());
    }

    public function view($id)
    {
        $orders = Order::where('orderNo', $id)
            ->join('farmers', 'farmers.id','orders.farmerId')
            ->get();
        return $orders;
    }
}
