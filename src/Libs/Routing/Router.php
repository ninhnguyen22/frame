<?php

namespace Nin\Libs\Routing;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Router as BaseRoute;

class Router extends BaseRoute implements RoutingInterface
{
    protected string $routerName;

    public function __construct(
        LoaderInterface $loader,
        $resource,
        array $options = [],
        RequestContext $context = null
    ) {
        parent::__construct($loader, $resource, $options, $context);
    }

    /**
     * Get route collection
     *
     * @return RouteCollection
     */
    public function getRoutes()
    {
        return $this->getRouteCollection();
    }

    public function getRouteName(): string
    {
        return $this->routerName;
    }

    public function extractRoute()
    {
        $params = $this->match($this->getContext()->getPathInfo());
        $this->routerName = $params['_route'];

        return $params;
    }

    public function getParameters(): array
    {
    }

    public function getRoute()
    {

    }
}
