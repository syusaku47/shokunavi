<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthControllers extends Controller
{
    protected $customer_redirectTo = '/index';
    protected $user_redirectTo = '/index';

    protected $authService;

    public function __construct(AuthService $authService) {
        $this->authService = $authService;

    }

    public function getLogin() {
        return view('auth.login');
    }
    
    public function postLogin(Request $req) {
        $isAuthenticated = $this->authService->authorize($req->all());
        if($isAuthenticated) {
            $role = $this->authService->getUserRole($req->input('user_id'));
            switch($role) {
                case 'customers':
                    return redirect($this->customer_redirectTo);
                case 'users':
                    return redirect($this->user_redirectTo);
            }
        } else {
            return redirect()->back()->with('error_msg', config('errors.auth_failed'));
        }
    }
}
