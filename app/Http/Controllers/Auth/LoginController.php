<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Auth\Request;
// use \Illuminate\Http\Request;

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
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if(Auth::check() && Auth::user()->role_id == 1){
            $this->redirectTo = 'admin';
        } elseif(Auth::check() && Auth::user()->role_id == 2){
            $this->redirectTo ='user';
        } elseif(Auth::check() && Auth::user()->role_id == 3){
            $this->redirectTo ='manager';
        }
       
        $this->middleware('guest')->except('logout');
    }

     protected function authenticated(\Illuminate\Http\Request $request, $user)
    {
         if(Auth::check() && Auth::user()->role_id == 1){
             return redirect('/admin'); 

            } elseif(Auth::check() && Auth::user()->role_id == 2){
                    return redirect('/user'); 

            } elseif(Auth::check() && Auth::user()->role_id == 3){
                    return redirect('/manager'); 
            }   
     }

}
