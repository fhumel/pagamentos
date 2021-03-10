<?php

namespace Tests\Entities\Users;

use App\Entities\Users\UserEntity;
use Codeception\PHPUnit\TestCase;

/**
 * Class TransactionEntityTest
 * @package Tests\unit\Entities\Users
 * @author  Fernando Humel <flemuh@gmail.com>
 */
class TransactionEntityTest extends TestCase
{
    /** @var \App\Entities\Users\UserEntity|\Illuminate\Contracts\Foundation\Application|mixed */
    private UserEntity $entity;

    public function setUp(): void
    {
        parent::setUp();
        $this->entity = app(UserEntity::class);
    }

    public function testSetAndGetId()
    {
        $uId = '1';
        $this->entity
            ->setId($uId);
        $this->assertEquals($uId, $this->entity->getId());
    }
}
