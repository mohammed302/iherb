<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Country;
use App\Domain;
use App\Skill;
use App\Interset;
use App\Service;
use App\User_interset;
use App\User_service;
use App\User_skill;
use App\Setting;
use App\Qualification;
use App\Favorite_work;
use App\Favorite_workplace;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth:admin');
        $this->middleware('admin.type');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $data['users'] = User::where('id', '!=', 12)->get();
        $data['color'] = Setting::find(1);
        return view('admin.user.users', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $data['color'] = Setting::find(1);

        return view('admin.user.addUser', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {


        $this->validate($request, [
            'name' => 'required|max:204|unique:users',
            'password' => 'required|min:6|',
            'email' => 'required|min:6|unique:users',
            'tel' => 'required|unique:users',
            'address' => 'required',

           
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tel = $request->tel;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->save();



        $request->session()->flash('alert-success', 'تمت الاضافة بنجاح');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) {

        $data['color'] = Setting::find(1);
        $data['user'] = User::findorfail($user->id);



        return view('admin.user.updateUser', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user) {

        $this->validate($request, [
            'name' => 'required|max:204|unique:users,name,' . $user->id,
           
            'email' => 'required|min:6|unique:users,email,' . $user->id,
            'tel' => 'required|unique:users,tel,' . $user->id,
            'address' => 'required',
          
        ]);
        $user = User::findorfail($user->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tel = $request->tel;
          if ($request->password != null) {
        $user->password = bcrypt($request->password);
        }
        $user->address = $request->address;
        $user->update();
        $request->session()->flash('alert-success', 'تم بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) {

        if ($user->delete()) {
            return "delete success";
        } else {
            return "delete failed";
        }
    }

}
