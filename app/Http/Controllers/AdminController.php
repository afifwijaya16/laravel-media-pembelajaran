<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use Auth;
use Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        
        return view('admin.home');
    }

    public function perbarui_password() {
        return view('admin.perbarui_password');
    }

    public function update(Request $request) {

        // $this->validate($request, [
        //     'current-password'     => 'required',
        //     'new_password'     => 'required',
        //     'new_password_confirm' => 'required|same:new_password',
        // ]);

        $admin = Admin::findorfail(Auth::id());

        if (!(Hash::check($request->get('current-password'), $admin->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Password Lama Salah.");
        }
            
        if(strcmp($request->get('current-password'), $request->get('new_password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Masukan Password Baru.");
        }
        if(!(strcmp($request->get('new_password'), $request->get('new_password_confirm'))) == 0){
            //New password and confirm password are not same
            return redirect()->back()->with("error","Ulangi Password Baru.");
        }

        
        $admin->password = Hash::make($request->get('new_password'));
        $admin->save();
            
        return redirect()->back()->with("success","Password changed successfully !");
    }

}
