<?php

/**
 * Returns a factory created class with custom attributes
 */
function create($class, array $attributes = [])
{
    return factory($class)->create($attributes);
}

/**
 * Returns a collection of a factory created class
 */
function createMany($class, $count, array $attributes = [])
{
    return factory($class, $count)->create($attributes);
}

function make($class, array $attributes = [])
{
    return factory($class)->make($attributes);
}

function makeMany($class, $count, array $attributes = [])
{
    return factory($class, $count)->make($attributes);
}
