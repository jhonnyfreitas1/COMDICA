<?php

namespace App\Providers;

use App\User;
use Auth;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('admin', function(User $user){
            return $user->tipo_user == '1';
        });

        $gate->define('admin-comdica', function(User $user){
            if($user->tipo_user == '1' || $user->tipo_user == '2'){
                return true;
            }
        });

        $gate->define('denuncia', function(User $user){
            if($user->tipo_user == '1' || $user->tipo_user == '2' || $user->tipo_user == '3' ||$user->tipo_user == '4' || $user->tipo_user == '5' || $user->tipo_user == '6'){
                return true;
            }
        });

        $gate->define('arquivada', function(User $user){
            if($user->tipo_user == '1' || $user->tipo_user == '2' || $user->tipo_user == '3' || $user->tipo_user == '5' || $user->tipo_user == '6'){
                return true;
            }
        });
    }
}
