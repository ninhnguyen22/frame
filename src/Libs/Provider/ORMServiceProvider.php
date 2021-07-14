<?php

namespace Nin\Libs\Provider;

use Nin\Libs\ORM\Doctrine\ORMDoctrineManager;
use Nin\Libs\ORM\Doctrine\ORMDoctrineConnection;
use Nin\Libs\ORM\ORMConfig;
use Nin\Libs\ORM\ORMConfigContract;
use Nin\Libs\ORM\ORMConnectionContract;
use Nin\Libs\ORM\ORMConnectionProperty;
use Nin\Libs\ORM\ORMConnectionPropertyContract;
use Nin\Libs\ORM\ORMManagerContract;

/**
 * Class ORMServiceProvider
 * @package Nin\Libs\Provider
 */
class ORMServiceProvider extends AbstractServiceProvider
{
    public $bindings = [
        ORMConnectionPropertyContract::class => ORMConnectionProperty::class,
        ORMConnectionContract::class => ORMDoctrineConnection::class,
        ORMConfigContract::class => ORMConfig::class,
        ORMManagerContract::class => ORMDoctrineManager::class
    ];

    public function register()
    {
    }
}
