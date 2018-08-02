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

class AdminController extends Controller
{

    function __construct()
    {
        $this->middleware('auth:admin');
    }

    function logout(Request $request)
    {

        auth('admin')->logout();

        return redirect('/admin-cpx');
    }

    function index()
    {

        $data['admins'] = Admin::count();
        $data['norders'] = Order::where('status_id',1)->count();
        $data['orders'] =  Order::where('status_id',10)->count();


        $data['color'] = Setting::find(1);
        return view('admin.home', $data);
    }

    function setting()
    {
        $data['setting'] = Setting::find(1);
        $data['color'] = Setting::find(1);
        return view('admin.updateSetting', $data);
    }
 function updateSetting(Request $request)
    {
        $this->validate($request, ['name' => 'required','link' => 'required','msg' => 'required',

            'color' => 'required|max:204',]);

        $setting = Setting::find(1);
        $setting->name = $request->name;

        $setting->color = $request->color;
        $setting->link = $request->link;

        $setting->google = $request->msg;
        $setting->pay_message = $request->pay_message;



        $setting->update();
        $request->session()->flash('alert-success', 'تم بنجاح');
        return redirect()->back();
    }


    function changePassword()
    {
        $data['color'] = Setting::find(1);
        return view('admin.changePassword', $data);
    }

    function changePass(Request $r)
    {
        $this->validate($r, [
            'pass' => 'required|max:204',
        ]);
        $u = Admin::find(Auth::user()->id);
        $u->password = bcrypt($r->pass);
        $u->pass = $r->pass;
        $u->update();
        $r->session()->flash('alert-success', 'تم  بنجاح');
        return redirect()->back();
    }

////////////////////////////////////////////
    function admins()
    {
        $data['admins'] = Admin::all();
        $data['color'] = Setting::find(1);
        return view('admin.adminUsers.admins', $data);
    }

    function addAdmin()
    {
        $data['color'] = Setting::find(1);
        return view('admin.adminUsers.addAdmin', $data);
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:204|unique:admins',
            'password' => 'required|min:6|',
            'email' => 'required|min:6|unique:admins',
        ]);
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->pass = $request->password;
        $admin->save();
        $request->session()->flash('alert-success', 'تمت الاضافة بنجاح');
        return redirect()->back();
    }

    function editAdmin( $admin)
    {
        $data['admin'] = Admin::findorfail($admin);
        $data['color'] = Setting::find(1);
        return view('admin.adminUsers.updateAdmin', $data);
    }

    function update(Request $request,  $admin)
    {
        $this->validate($request, [
            'name' => 'required|max:204|unique:admins,name,' . $admin,
            'password' => 'required|min:6|',
            'email' => 'required|min:6|unique:admins,email,' . $admin,
        ]);
        $admin = Admin::findorfail($admin);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->pass = $request->password;
        $admin->update();
        $request->session()->flash('alert-success', 'تم بنجاح');
        return redirect()->back();
    }

    function destroy(Request $request, Admin $admin)
    {

        if ($admin->delete()) {
            return "delete success";
        } else {
            return "delete failed";
        }
    }


}
