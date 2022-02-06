<?php

namespace Catalog\Application\Product;

use Catalog\Application\Product\Query\FindProductByIdQuery;
use Catalog\Domain\Model\Product\Product;
use Catalog\Domain\Product\Service\ProductFindById;

class FindProductByIdHandler
{
    private ProductFindById $service;

    public function __construct(ProductFindById $service)
    {
        $this->service = $service;
    }

    public function handle(FindProductByIdQuery $query): Product
    {
        return $this->service->execute($query->id());
    }
}
