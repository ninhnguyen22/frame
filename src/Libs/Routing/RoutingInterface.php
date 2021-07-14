<?php

namespace Nin\Libs\Routing;

interface RoutingInterface
{
    public function getRouteName(): string;

    public function getRoutes();

    public function getParameters(): array;
}
