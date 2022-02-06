<?php

namespace Catalog\Domain\Model\Product;

use Catalog\Domain\Model\Product\ValueObject\ProductId;

interface ProductRepository
{
    public function findById(ProductId $productId): Product;
}
