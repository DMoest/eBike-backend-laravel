<?php

namespace App\Providers;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Mockery\Generator\StringManipulation\Pass\Pass;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        if (! $this->app->routesAreCached()) {

            Passport::routes();

//            Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');
//            Passport::hashClientSecrets();

            Passport::tokensCan([
                'application' => 'Perform administrative opperations/tasks to create, read, update and delete information. This client is intended for use with third party application development to be integrated with the E-Bike system.',
                'admin' => 'Perform administrative tasks to create, read, update and delete information in the E-Bike system.',
                'user' => 'Retrieve information associated with your user account in the E-Bike system.',
            ]);
        }
    }
}
