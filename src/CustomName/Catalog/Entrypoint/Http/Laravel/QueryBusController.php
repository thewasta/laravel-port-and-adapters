<?php

namespace Catalog\Entrypoint\Http\Laravel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use League\Tactician\Plugins\LockingMiddleware;

class QueryBusController extends Controller
{
    protected CommandBus $bus;
    
    public function __construct(Request $request)
    {
        $locator = new InMemoryLocator();
        
        $this->bus = new CommandBus([
            new LockingMiddleware(),
            new CommandHandlerMiddleware(
                new ClassNameExtractor(),
                $locator,
                new HandleInflector())
        ]);
    }
}
