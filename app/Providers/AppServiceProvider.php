<?php

namespace App\Providers;

use App\Repositories\AuthRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\Contracts\AuthRepositoryInterface;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use App\Services\ImageUpload;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->singleton(CompanyRepositoryInterface::class, CompanyRepository::class);
        $this->app->singleton(ImageUpload::class, function ($app) {
            return new ImageUpload();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
