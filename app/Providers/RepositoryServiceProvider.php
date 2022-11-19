<?php

namespace App\Providers;

use App\Repositories\Category\CategoryRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Category\CategoryRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);
    }
}
