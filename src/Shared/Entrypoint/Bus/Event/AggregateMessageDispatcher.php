<?php

namespace Shared\Entrypoint\Bus\Event;

use Illuminate\Events\Dispatcher;

class AggregateMessageDispatcher extends Dispatcher
{
    protected function queueHandler($class, $method, $arguments): void
    {
        [$listener, $job] = $this->createListenerAndJob($class, $method, $arguments);
        $connection = $this->resolveQueue()->connection($listener->connection ?? null);

        $queue = method_exists($listener, 'queue') ? $listener->queue() : env('RABBIT_QUEUE');

        isset($listener->delay)
            ? $connection->laterOn($queue, $listener->delay, $job)
            : $connection->pushOn($queue, $job);
    }
}
