<?php

namespace Nin\Libs\Logger;

interface LoggerContract
{
    public function warning($message, array $context = array());

    public function notice($message, array $context = array());

    public function debug($message, array $context = array());

    public function error($message, array $context = array());
}
