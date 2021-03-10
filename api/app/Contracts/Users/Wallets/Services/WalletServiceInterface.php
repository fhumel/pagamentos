<?php

namespace App\Contracts\Users\Wallets\Services;

use App\Entities\Users\Wallets\WalletEntity;
use Illuminate\Support\Collection;

interface WalletServiceInterface
{

    /**
     * Método para retornar balance de uma carteira
     * @param array $dados
     * @return array
     * @throws \Exception
     */
    public function balance(array $dados): array;

    /**
     * Método para depositar em uma carteira
     * @param array $dados
     * @return WalletEntity
     * @throws \Exception
     */
    public function deposit(array $dados): WalletEntity;
}
