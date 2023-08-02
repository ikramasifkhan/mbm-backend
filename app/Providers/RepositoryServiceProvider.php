<?php

namespace App\Providers;

use App\Repositories\Interfaces\TaskInterface;
use App\Repositories\Interfaces\UserInterface;
use App\Repositories\Repos\TaskRepo;
use App\Repositories\Repos\UserRepo;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(
            TaskInterface::class,
            TaskRepo::class
        );

        $this->app->bind(
            UserInterface::class,
            UserRepo::class
        );
    }
}
