<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Setting;
use App\Admin;
use App\Offer;
use App\Order;
use App\State;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon;

class OrderController extends Controller
{

    function __construct()
    {
        $this->middleware('auth:admin');
    }

    

    /// Orders
    function orders()
    {

            $data['orders'] = Order::orderby('id', 'desc')->get();
            $data['states']=State::all();
            $data['color'] = Setting::find(1);
            return view('admin.order.orders', $data);

    }
    
      /// Orders search
    function orders_search($id)
    {

            $data['orders'] = Order::where('status_id',$id)->orderby('id', 'desc')->get();
            $data['states']=State::all();
            $data['color'] = Setting::find(1);
            return view('admin.order.orders', $data);

    }
    // update
    function update(Request $request, $id,$st)
    {
       
      
        
        $order = Order::findorfail($id);
        $order->status_id = $st;
        $order->save();
     // return redirect()->route('admin.orders');
        
    }
     // update order
    function updateOrder(Request $request, $id)
    {
       
      
        
        $order = Order::findorfail($id);
        $order->status_id = 8;
         $order->order = $request->order;
        $order->save();
   
        
    }
     // update charge
    function updateCharge(Request $request, $id)
    {
       
      
        
        $order = Order::findorfail($id);
        $order->status_id = 9;
         $order->charge = $request->charge;
         $order->save();
   
        
    }
     // update c
    function edit( $id)
    {
      $data['order']=Order::findorfail($id);
      $data['states']=State::all();
      $data['color'] = Setting::find(1);
      return view('admin.order.updateState',$data); 
     
        
 
        
    }
    // destroy order
    function destroyOrder(Request $request, $order)
    {
       $or=Order::findorfail($order);
        $or->delete();

    }
 // destroy all orders
    function destroyOrders(Request $requestr)
    {
       Order::truncate();
       

    }
}
