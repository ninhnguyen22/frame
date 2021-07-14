<?php

namespace Nin\Libs\Logger;

use Nin\Libs\Support\Config\AbstractConfig;

class LoggerConfig extends AbstractConfig implements LoggerConfigContract
{
    public function getName(): string
    {
        return $this->config->get('log.name', 'nin_logger');
    }

    public function getDirPath(): string
    {
        return $this->config->get('log.dir', 'logs');
    }

    public function getFilePath(): string
    {
        return $this->config->get('log.file', 'nin.log');
    }

    public function getRealPath(): string
    {
        $dir = $this->getDirPath();
        $file = $this->getFilePath();
        return ROOT . $dir . DIRECTORY_SEPARATOR . $file;
    }
}
