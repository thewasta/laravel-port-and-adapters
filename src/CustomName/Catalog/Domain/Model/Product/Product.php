<?php

namespace Catalog\Domain\Model\Product;

use Catalog\Domain\Model\Product\ValueObject\ProductId;
use Catalog\Domain\Model\Product\ValueObject\ProductName;

class Product
{
    public ProductId $id;

    public ProductName $name;

    public function id(): ProductId
    {
        return $this->id;
    }

    public function name(): ProductName
    {
        return $this->name;
    }
}
