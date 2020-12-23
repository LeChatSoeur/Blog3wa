<?php

namespace App\Providers;

use App\Repositories\AjaxRepository;
use App\Repositories\AjaxRepositoryInterface;
use App\Repositories\DynamicPageRepository;
use App\Repositories\DynamicPagesRepositoryInterface;
use App\Repositories\NavRepository;
use App\Repositories\NavsRepositoryInterface;
use App\Repositories\SlugRepository;
use App\Repositories\SlugsRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
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

        $this->app->bind(
            SlugsRepositoryInterface::class,
            SlugRepository::class,
        );

        $this->app->bind(
            NavsRepositoryInterface::class,
            NavRepository::class,
        );

        $this->app->bind(
            AjaxRepositoryInterface::class,
            AjaxRepository::class,
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class,
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
