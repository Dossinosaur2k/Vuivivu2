<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        $this->app->bind(\App\Repositories\Interfaces\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\TourRepository::class, \App\Repositories\TourRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\RoleRepository::class, \App\Repositories\RoleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\CrawlHistoryRepository::class, \App\Repositories\CrawlHistoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\CategoriesRepository::class, \App\Repositories\CategoriesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\PostsRepository::class, \App\Repositories\PostsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\BannersRepository::class, \App\Repositories\BannersRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\AdsRepository::class, \App\Repositories\AdsRepositoryEloquent::class);
        //:end-bindings:
    }
}
