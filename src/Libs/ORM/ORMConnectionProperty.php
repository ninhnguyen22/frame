<?php

namespace Nin\Libs\ORM;

use Nin\Libs\Support\Config\AbstractConfig;

class ORMConnectionProperty extends AbstractConfig implements ORMConnectionPropertyContract
{
    public function getDriver(): string
    {
        return $this->config->get('orm.connection.driver', 'pdo_mysql');
    }

    public function getHost(): string
    {
        return $this->config->get('orm.connection.host', 'localhost');
    }

    public function getDbName(): string
    {
        return $this->config->get('orm.connection.dbname', 'ni');
    }

    public function getUser(): string
    {
        return $this->config->get('orm.connection.user', 'root');
    }

    public function getPassword(): string
    {
        return $this->config->get('orm.connection.password', 'secret');
    }
}
