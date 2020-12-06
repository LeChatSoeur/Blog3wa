<?php

namespace App\Providers;

use App\Repositories\DynamicPageRepository;
use App\Repositories\DynamicPagesRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\PostsRepositoryInterface;
use App\Repositories\PostRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
           PostsRepositoryInterface::class,
            PostRepository::class,
    );
        $this->app->bind(
            DynamicPagesRepositoryInterface::class,
            DynamicPageRepository::class,
        );

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
