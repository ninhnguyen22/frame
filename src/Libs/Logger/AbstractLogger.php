<?php

namespace Nin\Libs\Logger;

use Psr\Log\LoggerInterface;

/**
 * Class AbstractLogger
 * @package Nin\Libs\Logger
 */
class AbstractLogger implements LoggerContract
{
    /**
     * @var LoggerInterface
     */
    protected LoggerInterface $logger;

    public function warning($message, array $context = array())
    {
        $this->logger->warning($message, $context);
    }

    public function notice($message, array $context = array())
    {
        $this->logger->notice($message, $context);
    }

    public function debug($message, array $context = array())
    {
        $this->logger->debug($message, $context);
    }

    public function error($message, array $context = array())
    {
        $this->logger->error($message, $context);
    }
}
