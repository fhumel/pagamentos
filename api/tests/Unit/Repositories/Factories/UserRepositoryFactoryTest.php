<?php

namespace Tests\Repositories\Users\Factories;

use App\Contracts\Users\Repositories\UserRepositoryInterface;
use App\Repositories\Users\Factories\UserRepositoryFactory;
use Tests\TestCase;

/**
 * Class UserRepositoryFactoryTest
 * @package Tests\Repositories\Users\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserRepositoryFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $userRepository = (new UserRepositoryFactory())();
        $this->assertInstanceOf(UserRepositoryInterface::class, $userRepository);
    }
}
