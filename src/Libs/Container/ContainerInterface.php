<?php

namespace Nin\Libs\Container;

interface ContainerInterface
{
    public function make($instance, array $parameters = []);

    public function has($instance): bool;

    public function bind($instance, $concrete = null): void;
}
