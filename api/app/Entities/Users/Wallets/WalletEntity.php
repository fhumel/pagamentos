<?php

namespace App\Entities\Users\Wallets;

use App\Entities\Users\UserEntity;

class WalletEntity
{
    /** @var integer */
    private ?int $id = null;

    /** @var float */
    private float $money;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return \App\Entities\Users\Wallets\WalletEntity
     */
    public function setId(?int $id): WalletEntity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return float
     */
    public function getMoney(): float
    {
        return $this->money;
    }

    /**
     * @param float|null $money
     * @return WalletEntity
     */
    public function setMoney(?float $money): WalletEntity
    {
        $this->money = $money;
        return $this;
    }
}
