<?php

namespace Shared\Infrastructure\Persistence\Mysql;

use Shared\Infrastructure\Persistence\Eloquent\Eloquent;

class Mysql extends Eloquent
{
    public function __construct()
    {
        parent::__construct();
        $this->connection()->setConnection("mysql");
    }
}
