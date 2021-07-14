<?php

namespace Nin\Libs\ORM;

abstract class ORMConnection
{
    protected ORMConnectionPropertyContract $property;

    public function __construct(ORMConnectionPropertyContract $property)
    {
        $this->property = $property;
    }
}
