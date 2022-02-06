<?php

namespace Shared\Domain\ValueObject;

abstract class FloatValueObject implements ValueObject
{
    private $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public static function from(float $value): FloatValueObject
    {
        return new static($value);
    }

    public function value(): float
    {
        return $this->value;
    }

    final public function jsonSerialize(): float
    {
        return $this->value;
    }
}
