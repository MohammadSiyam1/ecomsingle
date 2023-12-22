<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function pendingOrder(){
        $pendingOrders=Order::where('status','pending')->get();
        return view('admin.orders.pendingorders',compact('pendingOrders'));
    }

    public function storeToConfirmOrder(Request $request,$id){
        $pendingOrders=Order::find($id);
        if($pendingOrders->status='Pending'){
            $pendingOrders->status=$request->confirm;
            $pendingOrders->save();
        }

        return redirect()->route('admin.confirmedOrders')->with('message','Order Confirmed');
    }

    public function confirmedOrders(){
        $confirmedOrder=Order::where('status','confirm')->get();
        return view('admin.orders.confirmedOrders',compact('confirmedOrder'));
    }


}
