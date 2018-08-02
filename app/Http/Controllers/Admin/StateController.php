<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\State;
use App\Setting;
use Auth;
use Image;

class StateController extends Controller
{
  function __construct() {
        $this->middleware('auth:admin');
    }

    ////index
    public function index() {
        
        $data['color'] = Setting::find(1);

        $data['states'] = State::orderby('id', 'desc')->get();


        return view('admin.state.states', $data);
    }

    ////add state
    public function create() {

        $data['color'] = Setting::find(1);
        return view('admin.state.addState', $data);
    }

    public function store(Request $request) {


        $this->validate($request, [

            'name' => 'required',

        
        ]);




        $state = new State();
        $state->name = $request->name;


        $state->save();




        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();
    }

    ////update  state
    public function edit($id) {
        $data['state'] = State::findorfail($id);
        $data['color'] = Setting::find(1);
        return view('admin.state.updateState', $data);
    }

    public function update(Request $request, $id) {


        $this->validate($request, [
         
            'name' => 'required',

          
        ]);



        $state = State::findorfail($id);
        $state->name = $request->name;
        $state->update();




        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();
    }

    ////delete  state
    public function destroy(Request $request, $id) {

        $state =State::findorfail($id);
        $state->delete();
    }

}
