<?php

namespace Catalog\Infrastructure\Persistence\Eloquent\Product;

use Catalog\Domain\Model\Product\Product;
use Catalog\Domain\Model\Product\ProductRepository;
use Catalog\Domain\Model\Product\ValueObject\ProductId;

class EloquentProductRepository extends EloquentProductMap implements ProductRepository
{
    public function findById(ProductId $productId): Product
    {
        $this->models(...$this->query()->where("asdlasd","=","")->get()->toArray());
        return $this->model($this->query()->first());
    }
}
