<?php

namespace Nin\Libs\Logger;

interface LoggerConfigContract
{
    public function getName(): string;

    public function getDirPath(): string;

    public function getFilePath(): string;

    public function getRealPath(): string;
}
