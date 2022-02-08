<?php

namespace Shared\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Shared\Infrastructure\Persistence\Connector;
use Shared\Infrastructure\Persistence\ModelBase;

class Eloquent
{
    protected string $table;

    protected string $connectionName;

    protected bool $timestamps = true;

    protected array $mappedClass = [], $mappedAttributes = [], $listAttributes = [];

    private ModelBase $modelBase;

    private Connector $connection;

    public function __construct()
    {
        $this->modelBase = new ModelBase();
        $this->connection = new Connector();
        $this->connection()->setTable($this->table);
        $this->connection->timestamps = $this->timestamps;
    }

    public function connection(): Model
    {
        return $this->connection;
    }

    public function models(...$raws): array
    {
        $items = [];
        foreach ($raws as $raw) {
            $items[] = $this->model($raw);
        }

        return $items;
    }

    public function model($item)
    {
        return $item === null ? null : $this->modelBase->hydrate(
            $this->mappedClass,
            $this->mappedAttributes,
            $this->listAttributes,
            (object) $this->remap($item)
        );
    }

    private function remap($item)
    {
        if (isset($item->attributes)) {
            $item = $item->attributes;
        }
        return $item;
    }
}
