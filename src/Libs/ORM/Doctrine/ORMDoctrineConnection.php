<?php

namespace Nin\Libs\ORM\Doctrine;

use Doctrine\DBAL\DriverManager;
use Nin\Libs\ORM\ORMConnection;
use Nin\Libs\ORM\ORMConnectionContract;
use Nin\Libs\ORM\ORMConnectionPropertyContract;

class ORMDoctrineConnection extends ORMConnection implements ORMConnectionContract
{
    public function getConnector()
    {
        $connectionParams = $this->getConnectionProperties($this->property);
        return DriverManager::getConnection($connectionParams);
    }

    public function getConnectionProperties(ORMConnectionPropertyContract $property)
    {
        return array(
            'dbname' => $property->getDbName(),
            'user' => $property->getUser(),
            'password' => $property->getPassword(),
            'host' => $property->getHost(),
            'driver' => $property->getDriver()
        );
    }
}
