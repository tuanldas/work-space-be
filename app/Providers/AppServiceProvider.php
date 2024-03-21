<?php

namespace App\Providers;

use App\Repositories\Interface\EventRepositoryInterface;
use App\Repositories\EventRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            EventRepositoryInterface::class,
            EventRepository::class
        );
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
