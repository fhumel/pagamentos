<?php

namespace App\Mappers\Users\Wallets\Factories;

use App\Mappers\Users\Wallets\WalletMapper;
use App\Entities\Users\Wallets\WalletEntity;

class WalletMapperFactory
{
    public function __invoke(): WalletMapper
    {
        $walletEntity = app(WalletEntity::class);
        return new WalletMapper($walletEntity);
    }
}
