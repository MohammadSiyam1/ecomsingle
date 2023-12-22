<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ShippingInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTemplateController extends Controller
{
    public function CategoryPage($id){
        $category=Category::find($id);
        $products=Product::where('product_category_id',$id)->get();
        return view('user_template.category',compact('category','products'));
    }

    public function SingleProduct($id){
        $product=Product::find($id);
        $sub_category_id=Product::where('id',$id)->value('product_sub_category_id');
        $related_products=Product::where('product_sub_category_id',$sub_category_id)->get();
        return view('user_template.single-product',compact('product','related_products'));
    }

    public function AddToCart(Request $request){
        $p_price = $request->price * $request->quantity;
        $cart= new Cart();
        $cart->Product_id=$request->productId;
        $cart->User_id=Auth::id();
        $cart->Quantity=$request->quantity;
        $cart->Price=$p_price;
        $cart->save();
        return redirect()->route('CartPage')->with('message','Your item is added into cart');
    }

    public function CartPage(){
        $userId=Auth::id();
        $items=Cart::where('User_id',$userId)->get();
        return view('user_template.Cart',compact('items'));
    }

    public function deleteCartItem($id){
        Cart::find($id)->delete();
        return redirect()->route('CartPage')->with('message','Item has been deleted');
    }

    public function ShippingAddress(){
        return view('user_template.shipping_address');
    }

    public function StoreShippingAddress(Request $request){
        $validated = $request->validate([
            'phone_number' => 'required',
            'district' => 'required',
            'upazila' => 'required',
            'postal_code' => 'required',
        ]);
        $insert=new ShippingInformation();
        $insert->user_id=Auth::id();
        $insert->phone_number=$request->phone_number;
        $insert->district=$request->district;
        $insert->upazila=$request->upazila;
        $insert->postal_code=$request->postal_code;
        $insert->save();
        return redirect()->route('CheckOut');
    }

    public function CheckOut(){
        $userId=Auth::id();
        $items=Cart::where('User_id',$userId)->get();
        $shipping_address = ShippingInformation::where('user_id',$userId)->get()->first();
        return view('user_template.checkout',compact('items','shipping_address'));
    }

    public function placeOrder(Request $request){
        $userId=Auth::id();
        $items=Cart::where('User_id',$userId)->get();
        $shipping_address = ShippingInformation::where('user_id',$userId)->get()->first();

        $order=new Order();
        foreach ($items as $item) {
            $order->user_id = $userId;
            $order->phone_number = $shipping_address->phone_number;
            $order->district = $shipping_address->district;
            $order->upazila = $shipping_address->upazila;
            $order->postal_code = $shipping_address->postal_code;
            $order->product_id = $item->Product_id;
            $order->quantity = $item->Quantity;
            $order->total_price = $item->Price;
            $order->save();
            $cartId=$item->id;
            Cart::find($cartId)->delete();
        }
        $shipping_address->delete();
        return redirect()->route('PendingOrders')->with('message','Your order has been placed successfully');
    }

    public function UserDashboard(){
        return view('user_template.user-dashboard');
    }

    public function PendingOrders(){
        $pendingOrders=Order::where('status','pending')->get();
        return view('user_template.user-PendingOrders',compact('pendingOrders'));
    }

    public function History(){
        $confirmedorders=Order::where('status','confirm')->get();
        return view('user_template.user-history',compact('confirmedorders'));
    }

    public function NewRelease(){
        return view('user_template.newrelease');
    }

    public function TodaysDeal(){
        return view('user_template.todaysDeal');
    }

    public function CustomerService(){
        return view('user_template.customerService');
    }


}
