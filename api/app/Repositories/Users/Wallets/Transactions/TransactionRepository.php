<?php

namespace App\Repositories\Users\Wallets\Transactions;

use App\Contracts\Users\Wallets\Transactions\Repositories\TransactionRepositoryInterface;
use App\Mappers\Users\Wallets\Transactions\TransactionMapper;
use App\Contracts\Users\Wallets\Transactions\Mappers\TransactionMapperInterface;
use App\Models\Users\Wallets\Transactions\Transaction;
use Exception;

class TransactionRepository implements TransactionRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function list(): array
    {

        $transactions = Transaction::all();

        return $transactions->toArray();
    }

    /**
     * @inheritDoc
     */
    public function pay(array $dados): Transaction
    {
        return Transaction::create($dados);
    }
}
