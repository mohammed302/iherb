<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Setting;
use App\Admin;
use App\Order;
use App\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon;

class PaymentController extends Controller {

    function __construct() {
        $this->middleware('auth:admin');
    }

    /// payments
    function payments() {

        $data['payments'] = Payment::orderby('id', 'desc')->get();

        $data['color'] = Setting::find(1);
        return view('admin.payment.payments', $data);
    }
  /// payments search
    function payments_search($id)
    {

            $data['payments'] = Payment::where('status',$id)->orderby('id', 'desc')->get();
          
            $data['color'] = Setting::find(1);
            return view('admin.payment.payments', $data);

    }
    // update order
    function updateOrder(Request $request, $id, $or) {

        $payment = Payment::findorfail($id);
        $payment->status = 1;
        $payment->update();

        $order = Order::where('id', $or)->first();
        $order->status_id = 7;
        $order->update();
    }

    // update order
    function updateCancel(Request $request, $id,$or) {


     $payment = Payment::findorfail($id);
        $payment->status = 2;
        $payment->update();

        $order = Order::where('id', $or)->first();
     
        $order->status_id = 12;

        $order->save();
    }

    ////delete  payement
    public function destroy(Request $request, $id) {

        $bank = Payment::findorfail($id);
        $bank->delete();
    }

}
