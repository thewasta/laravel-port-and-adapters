<?php

namespace Catalog\Infrastructure\Persistence\Eloquent\Product;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Shared\Infrastructure\Persistence\Eloquent\Eloquent;
use Shared\Infrastructure\Persistence\Mysql\Mysql;

class EloquentProductMap extends Mysql
{
    protected string $table = "app_products";

    protected array $mappedClass = [
        'entity' => \Catalog\Domain\Model\Product\Product::class,
        'attributes' => [
            'id' => \Catalog\Domain\Model\Product\ValueObject\ProductId::class,
            'name' => \Catalog\Domain\Model\Product\ValueObject\ProductName::class,
        ]
    ];

    protected function query(): Builder
    {
        return DB::table($this->table . ' as products');
    }
}
