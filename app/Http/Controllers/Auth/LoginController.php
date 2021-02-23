<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest:web')->except(['logout', 'logoutUser']);
    }

    public function login(Request $request)
    {   
        $input = $request->all();
        $this->validate($request, [
            'no_user' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->no_user, FILTER_VALIDATE_EMAIL) ? 'email' : 'no_user';

        if(auth()->attempt(array($fieldType => $input['no_user'], 'password' => $input['password']))){
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('status','Email-Address And Password Are Wrong.');
        }
    }

    public function logoutUser()
    {
        $this->guard('web')->logout();
        return redirect('/');
    }
    
}
