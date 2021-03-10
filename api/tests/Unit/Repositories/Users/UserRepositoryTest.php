<?php

namespace Tests\Repositories\Users;

use App\Contracts\Users\Services\UserServiceInterface;
use App\Entities\Users\UserEntity;
use App\Mappers\Users\UserMapper;
use App\Repositories\Users\UserRepository;
use App\Model\User;
use Illuminate\Database\Query\Builder;
use Prophecy\Argument;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    private $userModel;

    private $userMapper;

    private $queryBuilder;

    public function setUp(): void
    {
        parent::setUp();
        $this->configureDependencies();
    }

    public function testFindById()
    {

        $userMapper = $this->configureUserMapperToRegister();
        $concreteClass = new UserRepository($this->userModel->reveal(), $userMapper->reveal());
        $retorno = $concreteClass->findById('0abcdd94-5cfe-49f2-b64a-16e4e90eb585');
        $this->assertEquals(
            [
                'id' => '0abcdd94-5cfe-49f2-b64a-16e4e90eb585',
                'name' => 'Teste ABC',
                'document' => '784.882.590-69',
                'type' => 'user',
                'email' => 'joao@teste.com.br'
            ],
            $retorno
        );
    }

    public function testRegister()
    {
        $userEntity = $this->makeEntity();
        $userMapper = $this->configureUserMapperToRegister();
        $this->queryBuilder->method('insert')->willReturn($this->userModel->reveal());
        $concreteClass = new UserRepository($this->userModel->reveal(), $userMapper->reveal());
        $return = $concreteClass->register($userEntity);
        $this->assertEquals(
            [
                'id' => '0abcdd94-5cfe-49f2-b64a-16e4e90eb585',
                'name' => 'Teste ABC',
                'document' => '784.882.590-69',
                'type' => 'user',
                'email' => 'joao@teste.com.br'
            ],
            $return
        );
    }

    private function makeEntity()
    {
        $userEntity = new UserEntity();
        $userEntity
            ->setId('0abcdd94-5cfe-49f2-b64a-16e4e90eb585')
            ->setName('Teste ABC')
            ->setEmail('joao@teste.com.br')
            ->setDocument('784.882.590-69')
            ->setType(UserServiceInterface::TYPE_USER);
        return $userEntity;
    }


    private function configureUserMapperToRegister()
    {
        $userMapper = clone $this->userMapper;
        $userMapper->revert(Argument::any())->willReturn(
            [
                'id' => '0abcdd94-5cfe-49f2-b64a-16e4e90eb585',
                'name' => 'Teste ABC',
                'document' => '784.882.590-69',
                'type' => 'user',
                'email' => 'joao@teste.com.br'
            ]
        );
        return $userMapper;
    }

    private function configureDependencies()
    {
        $this->userModel = $this->prophesize(User::class);
        $this->userMapper = $this->prophesize(UserMapper::class);
        $this->queryBuilder = $this->createMock(Builder::class);
        $this->userModel->newQuery()->willReturn($this->queryBuilder);
        $this->userModel->toArray()->willReturn(
            [
                'id' => '0abcdd94-5cfe-49f2-b64a-16e4e90eb585',
                'name' => 'Teste ABC',
                'document' => '784.882.590-69',
                'type' => 'user',
                'email' => 'joao@teste.com.br'
            ]
        );
        $this->queryBuilder->method('find')->willReturn($this->userModel->reveal());
    }
}
