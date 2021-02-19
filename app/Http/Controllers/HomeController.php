<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $penduduk = User::findorfail(Auth::id());
        if($penduduk->login == 0) {
            return view('user.password');
        }
        else {
            return view('user.home');
        }
    }

    public function password_change(Request $request) {
        $this->validate($request, [
            'password_change' => 'required',
        ]);
        $penduduk = User::findorfail(Auth::id());

        $penduduk_data = [
            'password' => Hash::make($request->password_change),
            'login' => 1,
        ];
        $penduduk->update($penduduk_data);
        return redirect()->route('home');
    }

    public function perbarui_password() {
        return view('user.perbarui_password');
    }

    public function update(Request $request) {

        // $this->validate($request, [
        //     'current-password'     => 'required',
        //     'new_password'     => 'required',
        //     'new_password_confirm' => 'required|same:new_password',
        // ]);

        
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
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

        $penduduk = User::findorfail(Auth::id());
        $penduduk->password = Hash::make($request->get('new_password'));
        $penduduk->save();
            
        return redirect()->back()->with("success","Password changed successfully !");
    }
}
