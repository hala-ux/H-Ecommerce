<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contract\BrandContract;
use App\Contract\CategoryContract;
use App\Contract\OrderContract;
use App\Contract\AttributeContract;
use App\Repositories\CategoryRepository;
use App\Repositories\BrandRepository;
use App\Repositories\AttributeRepository;
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
     $this->app->bind(\App\Contracts\OrderContract::class, App\Repositories\ClassImplementingOrderContract::class);
     $this->app->bind(\App\Contracts\AttributeContract::class, App\Repositories\ClassImplementingAttributeContract::class);
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
