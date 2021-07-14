<?php

namespace Nin\Libs\ORM;

class ORMAbstractManager implements ORMManagerContract
{
    protected ORMConfigContract $config;
    protected ORMConnectionContract $connection;

    public function __construct(ORMConfigContract $config, ORMConnectionContract $connection)
    {
        $this->config = $config;
        $this->connection = $connection;
    }

    public function getEntityManager()
    {
    }
}
