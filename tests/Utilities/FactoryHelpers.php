<?php

namespace Tests\Utilities;

trait FactoryHelpers
{
    public function create($class, $attributes = [], $times = null)
    {
        return factory($class, $times)->create($attributes);
    }

    public function make($class, $attributes = [], $times = null)
    {
        return factory($class, $times)->make($attributes);
    }
}

