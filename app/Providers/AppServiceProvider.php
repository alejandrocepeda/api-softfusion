<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Schema;
use Laravel\Passport\Passport;

/**
 * Class AppServiceProvider.
 */
class AppServiceProvider extends ServiceProvider
{
    protected $policies = ['App\Model' => 'App\Policies\ModelPolicy'];

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
        Schema::defaultStringLength(191);
        Passport::enableImplicitGrant();
        Resource::withoutWrapping();
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        if ('production' !== $this->app->environment()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
