<?php

namespace Nin\Libs\Routing;

use Nin\Libs\Request\RequestInterface;

interface RouteConfigInterface
{
    public function import(string $routeFile): RouteConfigInterface;

    public function getRoute(): RoutingInterface;

    public function configRequest(RequestInterface $request);
}
