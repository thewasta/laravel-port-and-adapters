<?php

namespace Shared\Entrypoint\Bus\Middleware;

use Illuminate\Support\Facades\DB;
use League\Tactician\Middleware;

class DatabaseTransaction implements Middleware
{
    public function execute($command, callable $next)
    {
        $pipeline = null;
        DB::connection('mysql')->transaction(function () use ($next, $command, &$pipeline) {
            $pipeline = $next($command);
        }, 5);
        return $pipeline;
    }
}
