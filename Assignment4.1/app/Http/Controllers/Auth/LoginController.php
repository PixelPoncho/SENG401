<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    //protected $redirectTo = '/home';
//NEW STUFF
    public function redirectTo(){
      //dd(Auth::user());
      // User role
      $role = Auth::user()->role;

      // Check user role
      switch ($role) {
          case 'visitor':
                  return '/visitor';
              break;
          case 'subscriber':
                  return '/subscriber';
              break;
          case 'admin':
                  return '/admin';
              break;
          default:
                  return '/login';
              break;
      }
    }
//END NEW STUFF

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
