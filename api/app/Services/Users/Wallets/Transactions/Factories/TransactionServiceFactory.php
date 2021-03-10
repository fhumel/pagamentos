<?php

namespace App\Services\Users\Wallets\Transactions\Factories;

use App\Contracts\Users\Wallets\Repositories\WalletRepositoryInterface;
use App\Contracts\Users\Wallets\Transactions\Repositories\TransactionRepositoryInterface;
use App\Services\Users\Wallets\Transactions\TransactionService;

class TransactionServiceFactory
{
    /**
     * @return TransactionService
     */
    public function __invoke()
    {
        /** @var TransactionRepositoryInterface $transactionRepository */
        $transactionRepository = app(TransactionRepositoryInterface::class);

        /** @var \App\Contracts\Users\Wallets\Repositories\WalletRepositoryInterface $walletRepository */
        $walletRepository = app(WalletRepositoryInterface::class);

        $externalAuthorizerUri = env('AUTHORIZER');

        return new TransactionService(
            $transactionRepository,
            $walletRepository,
            $externalAuthorizerUri
        );
    }
}
