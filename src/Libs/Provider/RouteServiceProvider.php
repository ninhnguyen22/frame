<?php

namespace Nin\Libs\Provider;

use Nin\Libs\Request\RequestContextContract;
use Nin\Libs\Routing\RouterConfigContract;
use Nin\Libs\Routing\RouterConfigure;
use Nin\Libs\Routing\RouterContract;
use Nin\Libs\Routing\RouterFactory;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;

class RouteServiceProvider extends AbstractServiceProvider
{
    public $bindings = [
    ];

    /**
     * Service provider register
     */
    public function register()
    {
        // Binding router configure
        $this->app->bind(RouterConfigContract::class, RouterConfigure::class);

        $config = $this->app->make(RouterConfigContract::class);
        $requestContext = $this->app->make(RequestContextContract::class);

        $this->app->bind(RouterContract::class, function () use ($config, $requestContext) {
            return new RouterFactory(
                $this->getLoader($config),
                $this->getResource($config),
                [],
                $requestContext
            );
        });
    }

    protected function getLoader(RouterConfigContract $config)
    {
        return new YamlFileLoader($this->getLocator($config));
    }

    protected function getLocator(RouterConfigContract $config)
    {
        return new FileLocator(array(ROOT . $config->getDir()));
    }

    protected function getResource(RouterConfigContract $config)
    {
        return $config->getFile();
    }
}
