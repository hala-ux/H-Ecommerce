<?php

namespace App\Providers;
use App\Contracts\BrandContract;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Contracts\OrderContract;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use App\Repositories\AttributeRepository;
use App\Contracts\AttributeContract;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    protected $repositories = [
        CategoryContract::class         =>          CategoryRepository::class,
        AttributeContract::class        =>          AttributeRepository::class,
        BrandContract::class            =>          BrandRepository::class,
        ProductContract::class          =>          ProductRepository::class,
        OrderContract::class          =>          OrderRepository::class,
    ];
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
