<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Cookie;
use DB;
use Request;
use Ixudra\Curl\Facades\Curl;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request)
    {
         if (!empty(request()->input('email')) && !empty(request()->input('password'))) {
            
            $results = DB::select('SELECT * FROM `users`  WHERE email="' . request()->input('email') . '"and password="' . md5(request()->input('password')) . '" ');

            foreach ($results as $v) {
                $id = $v->id;

            }
            if (!empty($results)) {
                Cookie::queue(Cookie::forget('user_id'));

                Cookie::queue('user_id', $id);

                request()->session()->regenerate();
                request()->session()->put('id', $id);
                if (request()->input('remember')) {
                    Cookie::queue('user_id', $id);
                }
                return redirect()->route('home');

            } else {
                return view('login')->with('message', 'Invalid Username or password');
            }
        } else {
           return view('login')->with('message', 'Invalid Username or password');

        }
    }
    public function logout()
    {
        Cookie::queue(Cookie::forget('user_id'));
        return view('login');
    }
    
}
