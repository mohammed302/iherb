<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bank;
use App\Setting;
use Auth;
use Image;

class BankController extends Controller
{
  function __construct() {
        $this->middleware('auth:admin');
    }

    ////index
    public function index() {
        
        $data['color'] = Setting::find(1);

        $data['banks'] = Bank::orderby('id', 'desc')->get();


        return view('admin.bank.banks', $data);
    }

    ////add bank
    public function create() {

        $data['color'] = Setting::find(1);
        return view('admin.bank.addBank', $data);
    }

    public function store(Request $request) {


        $this->validate($request, [

            'name' => 'required',

        
        ]);




        $bank = new Bank();
        $bank->name = $request->name;


        $bank->save();




        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();
    }

    ////update  bank
    public function edit($id) {
        $data['bank'] = Bank::findorfail($id);
        $data['color'] = Setting::find(1);
        return view('admin.bank.updateBank', $data);
    }

    public function update(Request $request, $id) {


        $this->validate($request, [
         
            'name' => 'required',

          
        ]);



        $bank = Bank::findorfail($id);
        $bank->name = $request->name;
        $bank->update();




        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();
    }

    ////delete  bank
    public function destroy(Request $request, $id) {

        $bank =Bank::findorfail($id);
        $bank->delete();
    }

}
