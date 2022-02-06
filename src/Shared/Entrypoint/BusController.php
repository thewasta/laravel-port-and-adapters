<?php

namespace BlackBoard\Shared\Entrypoint;

use App\Http\Controllers\Controller;
use League\Tactician\CommandBus;
use League\Tactician\Handler\Locator\InMemoryLocator;

class BusController extends Controller
{
    protected $locator;

    protected $bus;

    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
        $this->locator = new InMemoryLocator();
    }
}
