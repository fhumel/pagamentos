<?php

namespace App\Services\Users\Factories;

use App\Contracts\Users\Wallets\Repositories\WalletRepositoryInterface;
use App\Services\Users\UserService;
use App\Contracts\Users\Repositories\UserRepositoryInterface;

class UserServiceFactory
{
    /**
     * @return \App\Services\Users\UserService
     */
    public function __invoke()
    {
        /** @var \App\Contracts\Users\Wallets\Repositories\WalletRepositoryInterface $walletRepository */
        $walletRepository = app(WalletRepositoryInterface::class);

        /** @var \App\Contracts\Users\Repositories\UserRepositoryInterface $userRepository */
        $userRepository = app(UserRepositoryInterface::class);

        return new UserService(
            $userRepository,
            $walletRepository
        );
    }
}
