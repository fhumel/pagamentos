<?php

namespace App\Repositories\Users\Wallets\Transactions\Factories;

use App\Contracts\Users\Wallets\Transactions\Mappers\TransactionMapperInterface;
use App\Models\Users\User;
use App\Models\Users\Wallets\Transactions\Transaction;
use App\Repositories\Users\Wallets\Transactions\TransactionRepository;

class TransactionRepositoryFactory
{
    /**
     * @return TransactionRepository
     */
    public function __invoke()
    {

        return new TransactionRepository();
    }
}
