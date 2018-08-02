<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use App\Order;
use Illuminate\Support\Facades\Mail;
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

}
