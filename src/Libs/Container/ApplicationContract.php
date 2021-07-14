<?php

namespace Nin\Libs\Container;

/**
 * ApplicationContract
 * @package Nin\Libs\Container
 */
interface ApplicationContract
{
    public function bind($instance, $concrete = null);

    public function make($instance);

    public function singleton($instance);

    public function has($instance): bool;
}
