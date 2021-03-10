<?php

namespace App\Services\Users;

use App\Contracts\Users\Repositories\UserRepositoryInterface;
use App\Contracts\Users\Services\UserServiceInterface;
use App\Contracts\Users\Wallets\Repositories\WalletRepositoryInterface;
use App\Models\Users\User;

class UserService implements UserServiceInterface
{

    /** @var \App\Contracts\Users\Repositories\UserRepositoryInterface */
    private $userRepository;
    /**
     * @var \App\Contracts\Users\Wallets\Repositories\WalletRepositoryInterface
     */
    private $walletRepository;

    /**
     * UsuarioService constructor.
     *
     * @param \App\Contracts\Users\Repositories\UserRepositoryInterface $userRepository
     * @param \App\Contracts\Users\Wallets\Repositories\WalletRepositoryInterface $walletRepository
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        WalletRepositoryInterface $walletRepository
    ) {
        $this->userRepository = $userRepository;
        $this->walletRepository = $walletRepository;
    }

    /**
     * @inheritDoc
     */
    public function register(array $dados): User
    {

        $dados['wallet']['money'] = 0;

        $walletId = $this->walletRepository->create($dados['wallet']);

        $insertedId = $walletId->id;

        $dados['wallet_id'] = $insertedId;

        $dados['type'] = ($dados['type'] == 'logista' ? UserRepositoryInterface::LOGISTA :
            UserRepositoryInterface::COMUM);


        unset($dados['wallet']);

        $user = $this->userRepository->create($dados);

        return $user;
    }

    /**
     * @inheritDoc
     */
    public function list(): array
    {
        return $this->userRepository->list();
    }
}
