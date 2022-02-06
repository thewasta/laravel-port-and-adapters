<?php

namespace Shared\Infrastructure\Persistence;

use Illuminate\Database\Eloquent\Model;

class Connector extends Model
{
    protected $connection = "mysql";
    protected $table;
}
