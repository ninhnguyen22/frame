<?php

namespace Nin\Libs\ORM\Doctrine;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Nin\Libs\ORM\ORMAbstractManager;
use Nin\Libs\ORM\ORMConfigContract;
use Nin\Libs\ORM\ORMManagerContract;

class ORMDoctrineManager extends ORMAbstractManager implements ORMManagerContract
{
    public function getEntityManager()
    {
        $config = $this->getDoctrineConfig($this->config);
        $conn = $this->connection->getConnector();
        return EntityManager::create($conn, $config);
    }

    protected function getDoctrineConfig(ORMConfigContract $config)
    {
        $entitiesPath = $config->getEntitiesPath();
        $isDevMode = $config->getIsDevMode();
        $proxyDir = $config->getProxyDir();
        $cache = $config->getCache();
        $useSimpleAnnotationReader = $config->getUseSimpleAnnotationReader();
        return Setup::createAnnotationMetadataConfiguration($entitiesPath, $isDevMode, $proxyDir, $cache,
            $useSimpleAnnotationReader);
    }
}
