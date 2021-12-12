<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
      $validated = $request->validate([
        'email' => 'required|email',
        'password'=> 'required',

      ]);
      if (Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
          if(auth()->user()->is_admin==1)
          {
             return redirect()->route('admin.home');
          }else {
            {
              return redirect()->route('home');
            }
          }

        }else
        {
          return redirect()->route('login')->with('error','Invalid credentials');
        }

    }
}
