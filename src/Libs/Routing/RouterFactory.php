<?php

namespace Nin\Libs\Routing;

use Nin\Libs\Request\RequestContextContract;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Routing\Router;

/**
 * Class RouterFactory
 * @package Nin\Libs\Routing
 */
class RouterFactory extends Router implements RouterContract
{
    /**
     * RouterFactory constructor.
     * @param LoaderInterface $loader
     * @param $resource
     * @param array $options
     * @param RequestContextContract|null $context
     */
    public function __construct(
        LoaderInterface $loader,
        $resource,
        array $options = [],
        RequestContextContract $context = null
    ) {
        parent::__construct($loader, $resource, $options, $context);
    }

    /**
     * Get Parameter from route
     *
     * @return array
     */
    public function getParameters(): array
    {
        return $this->match($this->context->getPathInfo());
    }
}
