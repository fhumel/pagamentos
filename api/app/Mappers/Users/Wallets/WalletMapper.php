<?php

namespace App\Mappers\Users\Wallets;

use App\Contracts\Users\Wallets\Mappers\WalletMapperInterface;
use App\Entities\Users\Wallets\WalletEntity;

class WalletMapper implements WalletMapperInterface
{
    /** @var \App\Entities\Users\Wallets\WalletEntity */
    private WalletEntity $walletEntity;

    /**
     * UserMapper constructor.
     * @param \App\Entities\Users\Wallets\WalletEntity $walletEntity
     */
    public function __construct(WalletEntity $walletEntity)
    {
        $this->walletEntity = $walletEntity;
    }

    /**
     * @param array $dados
     * @return \App\Entities\Users\Wallets\WalletEntity
     */
    public function map(array $dados): WalletEntity
    {
        $walletEntity = clone $this->walletEntity;
        isset($dados['id']) ? $walletEntity->setId($dados['id']) : $walletEntity->setId(null);
        $walletEntity
            ->setMoney($dados['money']);
        return $walletEntity;
    }

    /**
     * @param \App\Entities\Users\Wallets\WalletEntity $walletEntity
     * @return array
     */
    public function revert(WalletEntity $walletEntity): array
    {
        return [
            'id' => $walletEntity->getId(),
            'money' => $walletEntity->getMoney()
        ];
    }
}
