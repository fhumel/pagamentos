<?php

namespace App\Providers\Users;

use App\Contracts\Users\Mappers\UserMapperInterface;
use App\Contracts\Users\Repositories\UserRepositoryInterface;
use App\Contracts\Users\Services\UserServiceInterface;
use App\Mappers\Users\Factories\UserMapperFactory;
use App\Repositories\Users\Factories\UserRepositoryFactory;
use App\Services\Users\Factories\UserServiceFactory;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{

    /**
    * @return void
    */
    public function register()
    {
            $this->app->bind(
                UserServiceInterface::class,
                function () {
                    return (new UserServiceFactory())();
                }
            );
//
            $this->app->bind(
                UserRepositoryInterface::class,
                function () {
                    return (new UserRepositoryFactory())();
                }
            );
//
            $this->app->bind(
                UserMapperInterface::class,
                function () {
                    return (new UserMapperFactory())();
                }
            );
    }

    /**
    * @return void
    */
    public function boot()
    {
    //
    }
}
