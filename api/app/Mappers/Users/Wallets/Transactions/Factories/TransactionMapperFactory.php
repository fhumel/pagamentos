<?php

namespace App\Mappers\Users\Wallets\Transactions\Factories;

use App\Entities\Users\Wallets\Transactions\TransactionEntity;
use App\Mappers\Users\Wallets\Transactions\TransactionMapper;

class TransactionMapperFactory
{
    public function __invoke(): TransactionMapper
    {
        $transactionEntity = app(TransactionEntity::class);
        return new TransactionMapper($transactionEntity);
    }
}
