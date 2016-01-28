<?php namespace SSDTest\Mocks;

use ReflectionClass;

class Model
{
    /**
     * Model constructor.
     *
     * @param array $props
     */
    public function __construct(array $props = [])
    {
        if (empty($props)) {
            return;
        }

        $reflection = new ReflectionClass(new static);

        foreach ($props as $key => $value) {

            if ( ! $reflection->hasProperty($key)) {
                continue;
            }

            $this->{$key} = $value;

        }
    }
}