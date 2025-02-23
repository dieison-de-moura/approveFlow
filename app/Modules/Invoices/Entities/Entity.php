<?php

namespace App\Modules\Invoices\Entities;

class Entity
{
    /**
     * Dynamically access properties on the entity.
     *
     * @param string $property
     * @return mixed
     * @throws PropertyNotFoundException
     */
    public function __get(string $property): mixed
    {
        if (isset($this->{$property})) {
            return $this->{$property};
        }

        return null;
    }

    /**
     * Dynamically set properties on the entity.
     *
     * @param string $property
     * @param mixed  $value
     * @return void
     */
    public function __set(string $property, mixed $value): void
    {
        $this->{$property} = $value;
    }
}
