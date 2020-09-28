<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = 'customer/shops';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    public function showLoginForm()
    {
        return view('customer.auth.login');  //変更
    }
 
    protected function guard()
    {
        return Auth::guard('customer');  //変更
    }
    
    public function logout(Request $request)
    {
        Auth::guard()->logout();  //変更
        $request->session()->flush();
        $request->session()->regenerate();
 
        return redirect('/customer/login');  //変更
    }

    protected function loggedOut(Request $request)
    {
        return redirect(route('/customer/login'));
    }
}
