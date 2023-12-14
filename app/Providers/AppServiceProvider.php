<?php

namespace App\Providers;

use App\Repositories\{ChecksEloquentORM, ChecksRepositoryInterface, UserEloquentORM};
use App\Repositories\{UserRepositoryInterface};
use App\Repositories\CarsEloquentORM;
use App\Repositories\CarsRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserEloquentORM::class);
        $this->app->bind(CarsRepositoryInterface::class, CarsEloquentORM::class);
        $this->app->bind(ChecksRepositoryInterface::class, ChecksEloquentORM::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
