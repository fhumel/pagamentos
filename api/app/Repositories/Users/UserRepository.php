<?php

namespace App\Repositories\Users;

use App\Contracts\Users\Mappers\UserMapperInterface;
use App\Contracts\Users\Repositories\UserRepositoryInterface;
use App\Mappers\Users\Wallets\Transactions\TransactionMapper;
use App\Contracts\Users\Wallets\Transactions\Mappers\TransactionMapperInterface;
use App\Models\Users\User;
use Exception;

/**
 * Class UserRepository
 * @package App\Repositories\Users
 */
class UserRepository implements UserRepositoryInterface
{

    /** @var \App\Models\Users\User $usuarioModel */
    private User $usuarioModel;

    /** @var \Illuminate\Database\Eloquent\Builder */
    private $queryBuilder;

    /** @var \App\Contracts\Users\Mappers\UserMapperInterface */
    private $userMapper;

    /**
     * UserRepository constructor.
     * @param \App\Models\Users\User                            $usuarioModel
     * @param \App\Contracts\Users\Mappers\UserMapperInterface  $userMapper
     */
    public function __construct(UserMapperInterface $userMapper, User $usuarioModel)
    {
        $this->userMapper = $userMapper;
        $this->usuarioModel = $usuarioModel;
        $this->queryBuilder = $this->usuarioModel->newQuery();
    }


    /**
     * @inheritDoc
     * @throws \Exception
     */
    public function create(array $dados): User
    {
        return User::create($dados);
    }

    /**
     * @inheritDoc
     */
    public function list(): array
    {

        $users = User::all();

        return $users->toArray();
    }
}
