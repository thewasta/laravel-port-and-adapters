<?php

namespace Shared\Domain\ValueObject;

abstract class StringValueObject implements ValueObject
{
    public function __construct(private string $value)
    {
    
    }
    
    public static function from(string $value)
    {
        return new static($value);
    }
    
    public function value(): string
    {
        return trim($this->value);
    }
    
    final public function jsonSerialize(): string
    {
        return $this->value;
    }
}
