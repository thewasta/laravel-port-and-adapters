<?php

namespace Catalog\Entrypoint\Http\Laravel\Product\Query;

use Catalog\Application\Product\Query\FindProductByIdQuery;
use Catalog\Entrypoint\Http\Laravel\QueryBusController;

class ProductGetController extends QueryBusController
{
    public function find()
    {
        $product = $this->bus->handle(new FindProductByIdQuery(1));
        return view('product', [
            "product" => $product
        ]);
    }
}
