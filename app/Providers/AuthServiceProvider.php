<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        User::class => UserPolicy::class,
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::policy(User::class, UserPolicy::class);

        /*  Gate::define('show_user', function (Admin $admin) {
              return $admin->hasAnyPermission('show_user');
          });

          Gate::define('add_user', function (Admin $admin) {
              return $admin->hasAnyPermission('add_user');
          });

          Gate::define('edit_user', function (Admin $admin) {
              return $admin->hasAnyPermission('edit_user');
          });

          Gate::define('delete_user', function (Admin $admin) {
              return $admin->hasAnyPermission('delete_user');
          });
  */
      /*  Gate::before(function ($admin, $ability) {


            if ($admin->hasAnyPermission($ability)) {
                return Response::allow();
            }
            return Response::deny('You do not have permission to create users.');


        });*/
    }
}
