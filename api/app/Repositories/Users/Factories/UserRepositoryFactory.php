<?php

namespace App\Repositories\Users\Factories;

use App\Contracts\Users\Mappers\UserMapperInterface;
use App\Repositories\Users\UserRepository;
use App\Models\Users\User;

class UserRepositoryFactory
{
    /**
     * @return UserRepository
     */
    public function __invoke()
    {
        /** @var \App\Contracts\Users\Mappers\UserMapperInterface $mapper */
        $mapper = app(UserMapperInterface::class);

        /** @var User $usuarioModel */
        $usuarioModel = app(User::class);

        return new UserRepository(
            $mapper,
            $usuarioModel
        );
    }
}
