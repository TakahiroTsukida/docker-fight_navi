<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Admin\Shop;
use App\Observers\Admin\ShopObserver;
use App\Admin\Admin;
use App\Observers\Admin\AdminObserver;
use App\User;
use App\Observers\User\UserObserver;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Shop::observe(ShopObserver::class);
        Admin::observe(AdminObserver::class);
        User::observe(UserObserver::class);

        if (request()->isSecure())
        {
            \URL::forceScheme('https');
        }
    }
}
