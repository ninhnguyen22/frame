<?php

namespace Nin\Libs\Container;

use Nin\Libs\Config\ConfigContract as ConfigContract;

/**
 * Trait BootDependency
 * @package Nin\Libs\Container
 */
trait BootDependency
{
    /**
     * Register boot dependencies
     */
    protected function registerDependencies()
    {
        foreach ($this->dependencies as $interface => $instance) {
            $this->container->bind($interface, $instance);
        }
    }


}
