<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Category\ICategoryService;
use App\Services\Category\CategoryService;
use App\Repositories\Category\ICategoryRepository;
use App\Repositories\Category\CategoryRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ICategoryService::class,CategoryService::class);
        $this->app->bind(ICategoryRepository::class,CategoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
