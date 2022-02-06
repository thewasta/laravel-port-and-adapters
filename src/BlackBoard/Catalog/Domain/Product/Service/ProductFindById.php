<?php

namespace Catalog\Domain\Product\Service;

use Catalog\Domain\Model\Product\Product;
use Catalog\Domain\Model\Product\ProductRepository;
use Catalog\Domain\Model\Product\ValueObject\ProductId;

class ProductFindById
{
    private ProductRepository $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $productId): Product
    {

        return $this->repository->findById(ProductId::from($productId));
    }
}
