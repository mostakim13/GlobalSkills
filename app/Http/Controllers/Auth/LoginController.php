<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\Request;

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
            if (session()->has('checkout'))
            {

                session()->forget('checkout');

                return redirect()->route('carts');
            }
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
    public function redirectToGoogle()
    {
      return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
      $user = Socialite::driver('google')->user();
      $this->registerOrLoginUser($user);
      return redirect()->route('home-user');
    }

    public function redirectToFacebook()
    {
      return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
      $user = Socialite::driver('facebook')->user();
      $this->registerOrLoginUser($user);
      return redirect()->route('home-user');
    }
    protected function registerOrLoginUser($data)
    {
      $user=User::where('email','=',$data->email)->first();
        if(!$user)
        {
          $user=new User();
          $user->name=$data->name;
          $user->email=$data->email;
          $user->provider_id=$data->id;
          //$user->image=$data->id;
          $user->save();
        }
        Auth::login($user);
        }
}
