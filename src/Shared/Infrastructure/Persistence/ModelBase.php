<?php

namespace Shared\Infrastructure\Persistence;

class ModelBase
{
    private array $mappedClass, $mappedAttributes, $listAttributes;

    public function hydrate(array $class, array $attributes, array $lists, ...$items)
    {
        $this->mappedClass = $class;
        $this->mappedAttributes = $attributes;
        $this->listAttributes = $lists;
        return $this->hydrateModels($items);

    }

    private function hydrateModels($items)
    {
        $list = [];
        foreach ($items as $item) {
            $hydrate = $this->hydrateEntity(
                (object) $item,
                $this->getEntity($this->mappedClass),
                $this->getAttributes($this->mappedClass),
                $this->mappedAttributes
            );
            $list[] = $this->createLists($this->getEntity($this->mappedClass), $hydrate);
        }
        return count($list) === 1 ? $list[0] : $list;
    }

    private function hydrateEntity($item, $entity, $values, $attributes): object
    {
        $reflectionClass = new \ReflectionClass($entity);
        $instance = $reflectionClass->newInstanceWithoutConstructor();

        foreach ($values as $key => $value) {

            $property = $reflectionClass->getProperty($key);
            $property->setAccessible(true);

            try {
                if (is_array($value)) {
                    $property->setValue($instance, $this->hydrateAggregate($item, $key, $attributes, $value));
                } else {
                    $property->setValue($instance,
                        $value::from($this->value($this->map($key, $attributes), (object) $item)));
                }
            } catch (\Throwable $exception) {
                throw new Exception("Error modeling atributte [" . $key . "] with value [" . $this->value($this->map($key,
                        $attributes), (object) $item) . "] of class [" . get_class($instance) . "]");
            }
        }
        return $instance;
    }

    private function hydrateAggregate($item, $attribute, $attributes, $value): object
    {
        $attributes = isset($attributes[$attribute]) ? $attributes[$attribute] : $attributes;

        return $this->hydrateEntity(
            $item,
            $this->getEntity($value),
            $this->getAttributes($value),
            $attributes
        );
    }

    private function getEntity($map)
    {
        return $map['entity'];
    }

    private function getAttributes($map)
    {
        return $map['attributes'];
    }

    private function value($path, $data)
    {
        return is_array($path)
            ? $this->value($path[array_key_first($path)], (object) $data->{array_key_first($path)})
            : @ $data->{$path};
    }

    private function map($needle, $array)
    {

        foreach ($array as $key => $value) {
            if ($key == $needle) {
                return $value;
            }
            if (is_array($value)) {
                if (($result = $this->map($needle, $value)) !== $needle) {
                    return $result;
                }
            }
        }
        return $needle;
    }

    private function createLists($entity, $instance)
    {
        $reflectionClass = new \ReflectionClass($entity);

        foreach ($this->listAttributes as $attribute) {
            $property = $reflectionClass->getProperty($attribute);
            $property->setAccessible(true);
            $property->setValue($instance, []);
        }
        return $instance;
    }
}
