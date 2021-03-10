<?php

namespace App\Repositories\Users\Wallets\Factories;

use App\Contracts\Users\Wallets\Mappers\WalletMapperInterface;
use App\Models\Users\User;
use App\Repositories\Users\Wallets\WalletRepository;
use App\Models\Users\Wallets\Wallet;

class WalletRepositoryFactory
{
    /**
     * @return WalletRepository
     */
    public function __invoke()
    {
        /** @var \App\Contracts\Users\Wallets\Mappers\WalletMapperInterface $mapper */
        $mapper = app(WalletMapperInterface::class);

        /** @var Wallet $walletModel */
        $walletModel = app(Wallet::class);

        return new WalletRepository(
            $mapper,
            $walletModel
        );
    }
}
