<?php

namespace Nin\Libs\Routing;

use Nin\Libs\Support\Config\AbstractConfig;

/**
 * Class RouterConfigure
 * @package Nin\Libs\Routing
 */
class RouterConfigure extends AbstractConfig implements RouterConfigContract
{
    public function getDir(): string
    {
        return $this->config->get('router.dir', 'config');
    }

    public function getFile(): string
    {
        return $this->config->get('router.file', 'routes.yaml');
    }
}
