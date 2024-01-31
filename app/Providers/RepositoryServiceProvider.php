<?php

namespace App\Providers;

use App\Modules\User\Repository\IUserRepository;
use App\Modules\User\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $repositories = [
            IUserRepository::class => UserRepository::class
        ];

        foreach ($repositories as $abstraction => $concrete) {
            $this->app->bind($abstraction, $concrete);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
