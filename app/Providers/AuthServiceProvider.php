<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }

    public function getUserRole($user_id) {
        if(ends_with($user_id, 'C')) {
            return 'customers';
        } else if(ends_with($user_id, 'U')) {
            return 'users';
        }
        return 'unknown';
    }

    public function authorize($data) {
        $user_id = $data['user_id'];
        $role = self::getUserRole($user_id);
        $password = $data['password'];
        if(Auth::guard($role)->attempt(['id' => $user_id, 'password' => $password, 'is_deleted' => 0])) {
            $user = Auth::guard($role)->user();
            session()->put('user_id', $user->id);
            session()->put('user_name', $user->name);
            session()->put('user_role', $role);
            return true;
        } 
        return false;
    }
}
