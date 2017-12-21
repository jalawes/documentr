<?php

function create($class, array $attributes = [])
{
    return factory($class)->create($attributes);
}

function createMany($class, $count, array $attributes = [])
{
    return factory($class, $count)->create($attributes);
}
