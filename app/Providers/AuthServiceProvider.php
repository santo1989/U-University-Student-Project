<?php

namespace App\Providers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        // Gate::define('create-notice', [NoticePolicy::class, 'create']);

        Gate::define('superVisor', function (User $user) {

            if ($user->role_id == 1) {
                return true;
            }

            return false;
        });

        Gate::define('coordinator', function (User $user) {

                    if ($user->role_id == 2) {
                        return true;
                    }
                    return false;
                });

        Gate::define('student', function (User $user) {

            if ($user->role_id == 3) {
                return true;
            }

            return false;
        });

     Gate::define('create-student', function (User $user) {
        if ($user->role_id == 3 && Auth::user()->id == $user->id) {
            return true;
        }
        return false;
    });

    Gate::define('create-notice', function (User $user) {
        if ($user->role_id == 1 || $user->role_id == 2 && Auth::user()->id == $user->id) {
            return true;
        }
        return false;
    });

    Gate::define('create-course', function (User $user) {
        if ($user->role_id == 1 || $user->role_id == 2 && Auth::user()->id == $user->id) {
            return true;
        }
        return false;
    });

    Gate::define('create-year', function (User $user) {
        if ($user->role_id == 1 || $user->role_id == 2 || $user->role_id == 3 && Auth::user()->id == $user->id) {
            return true;
        }
        return false;
    });

    
    
    }
}
