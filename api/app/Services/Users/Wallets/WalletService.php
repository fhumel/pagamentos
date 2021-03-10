<?php

namespace App\Services\Users\Wallets;

use App\Contracts\Users\Wallets\Repositories\WalletRepositoryInterface;
use App\Contracts\Users\Wallets\Services\WalletServiceInterface;
use App\Entities\Users\Wallets\WalletEntity;

class WalletService implements WalletServiceInterface
{

    /** @var \App\Contracts\Users\Wallets\Repositories\WalletRepositoryInterface */
    private WalletRepositoryInterface $walletRepository;

    /**
     * TransactionService constructor.
     *
     * @param \App\Contracts\Users\Wallets\Repositories\WalletRepositoryInterface $walletRepository
     */
    public function __construct(WalletRepositoryInterface $walletRepository)
    {
        $this->walletRepository = $walletRepository;
    }

    /**
     * @inheritDoc
     */
    public function balance(array $dados): array
    {
        return $this->walletRepository->balance($dados);
    }

    /**
     * @inheritDoc
     */
    public function deposit(array $dados): WalletEntity
    {
        return $this->walletRepository->deposit($dados);
    }
}
