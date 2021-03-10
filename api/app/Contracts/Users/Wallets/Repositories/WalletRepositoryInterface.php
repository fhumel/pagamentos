<?php

namespace App\Contracts\Users\Wallets\Repositories;

use App\Entities\Users\Wallets\WalletEntity;
use App\Models\Users\Wallets\Wallet;
use Illuminate\Support\Collection;

interface WalletRepositoryInterface
{

    /**
     * Método para depositar em uma carteira
     * @param array $dados
     * @return WalletEntity
     * @throws \Exception
     */
    public function deposit(array $dados): WalletEntity;

    /**
     * Método para depositar em uma carteira
     * @param array $dados
     * @return Wallet
     * @throws \Exception
     */
    public function withdrawn(array $dados): Wallet;

    /**
     * Método para retornar balance de uma carteira
     * @param array $dados
     * @return array
     * @throws \Exception
     */
    public function balance(array $dados): array;

    /**
     * Método criar uma carteira
     * @param array $dados
     * @return Wallet
     * @throws \Exception
     */
    public function create(array $dados): Wallet;
}
