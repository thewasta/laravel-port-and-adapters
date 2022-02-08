<?php

namespace Shared\Domain\ValueObject;

abstract class IntValueObject implements ValueObject
{
    public function __construct(private int $value)
    {
    }
    
    public static function from(int $value): IntValueObject
    {
        return new static($value);
    }
    
    public function value(): int
    {
        return $this->value;
    }
    
    final public function jsonSerialize(): int
    {
        return $this->value;
    }
}
