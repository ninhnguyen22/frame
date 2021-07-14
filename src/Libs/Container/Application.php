<?php

namespace Nin\Libs\Container;

class Application extends AbstractApplication
{
    protected array $dependencies = [
    ];

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
    }
}
