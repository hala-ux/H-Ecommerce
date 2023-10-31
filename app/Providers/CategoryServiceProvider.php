<?php

namespace App\Providers;

use Schema;
use Config;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('categories', function ($app) {
            return new Category();
        });
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Category', Category::class);
    }

  /**
 * Bootstrap services.
 *
 * @return void
 */
public function boot()
{
    // only use the categories package if the categories table is present in the database
    if (!\App::runningInConsole() && count(Schema::getColumnListing('categories'))) {
        $categories = Category::all();
        foreach ($categories as $key => $category)
        {
            Config::set('categories.'.$category->key, $category->value);
        }
    }
}
}
