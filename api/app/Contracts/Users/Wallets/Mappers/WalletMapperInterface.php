<?php

namespace App\Contracts\Users\Wallets\Mappers;

use App\Entities\Users\Wallets\WalletEntity;

interface WalletMapperInterface
{

    /**
     * Método hidratar Wallet
     * @param array $dados
     * @return WalletEntity
     * @throws \Exception
     */
    public function map(array $dados): WalletEntity;

    /**
     * Método revertet Wallet para array
     * @param WalletEntity $dados
     * @return array
     * @throws \Exception
     */
    public function revert(WalletEntity $dados): array;
}
