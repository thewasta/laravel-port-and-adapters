<?php

namespace Admin\Infrastructure\Persistence\Eloquent\User;

use Shared\Infrastructure\Persistence\Eloquent\Eloquent;

class EloquentUserMap extends Eloquent
{
    protected string $table = "app_products";
    
    protected array $mappedClass = [
        'entity' => \Admin\Domain\Model\User\User::class,
        'attributes' => [
            'name' => \Admin\Domain\Model\User\ValueObject\UserName::class,
        ]
    ];
}
