<?php

namespace Shared\Domain\ValueObject;

abstract class ArrayOfStringValueObject implements ValueObject
{
    private array $value;
    
    public function __construct(array $value)
    {
        $this->value = $value;
    }
    
    /** @noinspection PhpPureAttributeCanBeAddedInspection */
    public static function from(array $values): ArrayOfStringValueObject
    {
        return new static($values);
    }
    
    /** @noinspection PhpPureAttributeCanBeAddedInspection */
    public function toString(): array
    {
        $value = [];
        foreach ($this->value as $item) {
            if ($item instanceof StringValueObject) {
                $value[] = $item->value();
            } else {
                throw new \RuntimeException("$item must be instance of StringValueObject.");
            }
        }
        return $value;
    }
    
    final public function jsonSerialize()
    {
        return $this->value;
    }
}
