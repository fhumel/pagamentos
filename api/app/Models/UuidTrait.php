<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;

/**
 * Trait UuidTrait
 * @package App\Models
 */
trait UuidTrait
{
    /**
     * @return void
     */
    public static function bootUuid(): void
    {
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4();
        });
    }
}
