<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use App\Order;
use App\Bank;
use App\Payment;
use Carbon;

class HomeController extends Controller {

     ////ihome page
    public function index() {


        $data['setting'] = Setting::find(1);

        return view('front.home', $data);
    }

    // store order
    public function storeOrder(Request $request) {


        $this->validate($request, [

            'name' => 'required',
            'tel' => 'required',
            'address' => 'required',
            'link' => 'required',
        ]);




        $order = new Order();
        $order->name = $request->name;
        $order->whatsup = $request->tel;
        $order->address = $request->address;
        $order->link = $request->link;
        $order->date=  Carbon\Carbon::now();
        $order->save();
        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();
    }
  ////pay page
    public function pay() {


        $data['setting'] = Setting::find(1);
        $data['banks'] = Bank::all();
        return view('front.pay', $data);
    }
 // store payments
    public function storePayment(Request $request) {


        $this->validate($request, [

            'name' => 'required',
            'bank_from' => 'required',
            'money' => 'required',
            'order' => 'required',
        ]);


      $order_check=  Order::where('id',$request->order)->count();
if ($order_check==0) {
  echo 'error';
} else {
    // It exists - remove from favorites button will show

        $pay = new Payment();
        $pay->order_id = $request->order;
        $pay->name = $request->name;
        $pay->bank_from  = $request->bank_from;
        $pay->bank_to = $request->bank_to;
        $pay->amount = $request->money;
       
       
        $pay->date=  Carbon\Carbon::now();
        $pay->save();
        $request->session()->flash('alert-success', 'تم بنجاح');
}

      //  return redirect()->back();
    }
}
