<?php

namespace App\Entities\Users\Wallets\Transactions;

class TransactionEntity
{
    /** @var integer */
    private ?int $id = null;

    /** @var integer */
    private int $payer;

    /** @var integer */
    private int $payee;

    /** @var float */
    private float $value;

    /**
     * @return integer
     */
    public function getId(): ?int
    {
        return $this->id;
    }

        /**
     * @param int|null $id
     * @return TransactionEntity
     */
    public function setId(?int $id): TransactionEntity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return integer
     */
    public function getPayer(): int
    {
        return $this->payer;
    }

    /**
     * @param integer $payer
     * @return \App\Entities\Users\Wallets\Transactions\TransactionEntity
     */
    public function setPayer(int $payer): TransactionEntity
    {
        $this->payer = $payer;
         return $this;
    }

    /**
     * @return integer
     */
    public function getPayee(): int
    {
        return $this->payee;
    }

    /**
     * @param integer $payee
     * @return \App\Entities\Users\Wallets\Transactions\TransactionEntity
     */
    public function setPayee(int $payee): TransactionEntity
    {
        $this->payee = $payee;
         return $this;
    }

    /**
     * @return float
     */
    public function getvalue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value
     * @return \App\Entities\Users\Wallets\Transactions\TransactionEntity
     */
    public function setValue(float $value): TransactionEntity
    {
        $this->value = $value;
         return $this;
    }
}
