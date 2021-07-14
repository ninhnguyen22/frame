<?php

namespace Nin\Libs\Support\Config;

use Nin\Libs\Config\ConfigContract;

abstract class AbstractConfig
{
    protected ConfigContract $config;

    public function __construct(ConfigContract $config)
    {
        $this->config = $config;
    }

}
