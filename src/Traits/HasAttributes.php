<?php

declare(strict_types=1);

namespace Ydg\FoudationSdk\Traits;

trait HasAttributes
{
    /**
     * @var array<int|string,mixed>
     */
    protected $attributes = [];

    /**
     * @param array<int|string,mixed> $attributes
     */
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function __get(string $attribute)
    {
        return $this->attributes[$attribute] ?? null;
    }

    public function __set(string $attribute, $value)
    {
        $this->attributes[$attribute] = $value;
    }

    /**
     * @return array<int|string,mixed>
     */
    public function toArray(): array
    {
        return $this->attributes;
    }

    public function toJson()
    {
        return json_encode($this->attributes);
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->attributes);
    }

    /**
     * @param array<int|string,mixed> $attributes
     */
    public function merge(array $attributes)
    {
        $this->attributes = array_merge($this->attributes, $attributes);

        return $this;
    }

    /**
     * @return array<int|string,mixed> $attributes
     */
    public function jsonSerialize(): array
    {
        return $this->attributes;
    }

    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->attributes);
    }

    public function offsetGet($offset)
    {
        return $this->attributes[$offset];
    }

    public function offsetSet($offset, $value)
    {
        if ($offset === null) {
            $this->attributes[] = $value;
        } else {
            $this->attributes[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        unset($this->attributes[$offset]);
    }
}
