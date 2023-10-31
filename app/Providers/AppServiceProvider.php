<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contract\BrandContract;
use App\Contract\CategoryContract;
use App\Repositories\CategoryRepository;
use App\Repositories\BrandRepository;
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
     $this->app->bind(\App\Contracts\BrandContract::class, App\Repositories\ClassImplementingBrandContract::class);
     
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
