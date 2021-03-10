<?php

namespace App\Mappers\Users;

use App\Contracts\Users\Mappers\UserMapperInterface;
use App\Entities\Users\UserEntity;

class UserMapper implements UserMapperInterface
{
    /** @var \App\Entities\Users\UserEntity */
    private $userEntity;

    /**
     * UserMapper constructor.
     * @param \App\Entities\Users\UserEntity $userEntity
     */
    public function __construct(UserEntity $userEntity)
    {
        $this->userEntity = $userEntity;
    }

    /**
     * @param array $dados
     * @return \App\Entities\Users\UserEntity
     */
    public function map(array $dados): UserEntity
    {
        $userEntity = clone $this->userEntity;
        isset($dados['id']) ? $userEntity->setId($dados['id']) : '';
        $userEntity
            ->setWalletId($dados['wallet_id'])
            ->setName($dados['name'])
            ->setCpf($dados['cpf'])
            ->setEmail($dados['email']);
        return $userEntity;
    }

    /**
     * @param \App\Entities\Users\UserEntity $userEntity
     * @return array
     */
    public function revert($userEntity): array
    {
        return [
            'id' => $userEntity->getId(),
            'cpf' => $userEntity->getCpf(),
            'name' => $userEntity->getName(),
            'email' => $userEntity->getEmail(),
            'wallet_id' => $userEntity->getWalletId()
        ];
    }
}
