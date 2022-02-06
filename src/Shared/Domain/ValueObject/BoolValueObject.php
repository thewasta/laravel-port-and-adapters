<?php

namespace Shared\Domain\ValueObject;

abstract class BoolValueObject implements ValueObject
{
    private bool $value;

    public function __construct(bool $value)
    {
        $this->value = $value;
    }

    public static function from(bool $value): BoolValueObject
    {
        return new static($value);
    }

    public function value(): bool
    {
        return $this->value;
    }

    public function literal(): string
    {
        return $this->value ? "1" : "0";
    }

    final public function jsonSerialize(): bool
    {
        return $this->value;
    }
}
