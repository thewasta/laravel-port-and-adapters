<?php

namespace Catalog\Entrypoint\Http\Laravel;

use App\Http\Controllers\Controller;

class CatalogController extends Controller
{
    public function home()
    {
        return view("welcome");
    }
}
