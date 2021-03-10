<?php

namespace App\Providers\Users\Wallets\Transactions;

use App\Contracts\Users\Wallets\Transactions\Mappers\TransactionMapperInterface;
use App\Contracts\Users\Wallets\Transactions\Repositories\TransactionRepositoryInterface;
use App\Contracts\Users\Wallets\Transactions\Services\TransactionServiceInterface;
use App\Mappers\Users\Wallets\Transactions\Factories\TransactionMapperFactory;
use App\Repositories\Users\Wallets\Transactions\Factories\TransactionRepositoryFactory;
use App\Services\Users\Wallets\Transactions\Factories\TransactionServiceFactory;
use Illuminate\Support\ServiceProvider;

class TransactionServiceProvider extends ServiceProvider
{

    /**
    * @return void
    */
    public function register()
    {
            $this->app->bind(
                TransactionServiceInterface::class,
                function () {
                    return (new TransactionServiceFactory())();
                }
            );
//
            $this->app->bind(
                TransactionRepositoryInterface::class,
                function () {
                    return (new TransactionRepositoryFactory())();
                }
            );

            $this->app->bind(
                TransactionMapperInterface::class,
                function () {
                    return (new TransactionMapperFactory())();
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
