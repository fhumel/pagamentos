<?php

namespace App\Contracts\Users\Wallets\Transactions\Repositories;

use App\Models\Users\Wallets\Transactions\Transaction;
use Illuminate\Support\Collection;

interface TransactionRepositoryInterface
{
        /**
     * Método pagar para uma carteira
     * @param array $dados
     * @return Transaction
     * @throws \Exception
     */
    public function pay(array $dados): Transaction;

    /**
     * Método listar tarnsações
     * @return array
     * @throws \Exception
     */
    public function list(): array;
}
