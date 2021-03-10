<?php

namespace App\Mappers\Users\Factories;

use App\Entities\Users\UserEntity;
use App\Mappers\Users\UserMapper;

class UserMapperFactory
{
    public function __invoke(): UserMapper
    {
        $userEntity = app(UserEntity::class);
        return new UserMapper($userEntity);
    }
}
