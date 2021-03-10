<?php

namespace App\Providers\Users\Wallets;

use App\Contracts\Users\Wallets\Mappers\WalletMapperInterface;
use App\Contracts\Users\Wallets\Repositories\WalletRepositoryInterface;
use App\Contracts\Users\Wallets\Services\WalletServiceInterface;
use App\Mappers\Users\Wallets\Factories\WalletMapperFactory;
use App\Repositories\Users\Wallets\Factories\WalletRepositoryFactory;
use App\Services\Users\Wallets\Factories\WalletServiceFactory;
use Illuminate\Support\ServiceProvider;

class WalletServiceProvider extends ServiceProvider
{

    /**
    * @return void
    */
    public function register()
    {
            $this->app->bind(
                WalletServiceInterface::class,
                function () {
                    return (new WalletServiceFactory())();
                }
            );

            $this->app->bind(
                WalletRepositoryInterface::class,
                function () {
                    return (new WalletRepositoryFactory())();
                }
            );

            $this->app->bind(
                WalletMapperInterface::class,
                function () {
                    return (new WalletMapperFactory())();
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
