<?php

namespace Nin\Libs\Provider;

use Nin\Libs\Logger\LoggerConfig;
use Nin\Libs\Logger\LoggerConfigContract;
use Nin\Libs\Logger\MonoLogger;
use Nin\Libs\Logger\LoggerContract;

/**
 * Class LoggerServiceProvider
 * @package Nin\Libs\Provider
 */
class LoggerServiceProvider extends AbstractServiceProvider
{
    /**
     * Register logger
     */
    public function register()
    {
        $this->app->bind(LoggerConfigContract::class, function () {
            return new LoggerConfig($this->app->getConfig());
        });

        $this->app->bind(LoggerContract::class, MonoLogger::class);
    }
}
