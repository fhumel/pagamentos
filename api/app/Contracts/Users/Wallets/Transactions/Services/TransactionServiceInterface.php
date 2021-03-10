<?php

namespace App\Contracts\Users\Wallets\Transactions\Services;

use App\Models\Users\Wallets\Transactions\Transaction;

interface TransactionServiceInterface
{

    /**
     * Método pagar
     * @param array $dados
     * @return Transaction
     * @throws \Exception
     */
    public function pay(array $dados): Transaction;

    /**
     * Método listar
     * @return array
     * @throws \Exception
     */
    public function list(): array;
}
