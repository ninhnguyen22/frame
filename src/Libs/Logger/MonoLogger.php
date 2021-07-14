<?php

namespace Nin\Libs\Logger;

use Monolog\Handler\FirePHPHandler;
use Monolog\Handler\StreamHandler;
use Psr\Log\LoggerInterface;
use Monolog\Logger;

/**
 * Class MonoLogger
 * @package Nin\Libs\Logger
 */
class MonoLogger extends AbstractLogger implements LoggerContract
{
    protected LoggerInterface $logger;

    public function __construct(LoggerConfig $config)
    {
        $this->logger = $this->getLoggerFactory($config->getRealPath(), $config->getName());
    }

    /**
     * Get monolog factory
     *
     * @param $filePath
     * @param $loggerName
     * @return Logger
     */
    public function getLoggerFactory($filePath, $loggerName)
    {
        $stream = new StreamHandler($filePath);
        $firephp = new FirePHPHandler();

        $monoLogger = new Logger($loggerName);
        $monoLogger->pushHandler($stream);
        $monoLogger->pushHandler($firephp);
        return $monoLogger;
    }
}
