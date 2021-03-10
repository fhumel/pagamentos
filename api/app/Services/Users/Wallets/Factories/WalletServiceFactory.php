<?php

namespace App\Services\Users\Wallets\Factories;

use App\Contracts\Users\Wallets\Repositories\WalletRepositoryInterface;
use App\Services\Users\Wallets\WalletService;

class WalletServiceFactory
{
    /**
     * @return WalletService
     */
    public function __invoke()
    {
        /** @var WalletRepositoryInterface $walletRepository */
        $walletRepository = app(WalletRepositoryInterface::class);

        return new  WalletService(
            $walletRepository
        );
    }
}
