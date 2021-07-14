<?php

namespace Nin\Libs\View;

interface ViewConfigContract
{
    public function getDirLoader(): string;

    public function getCachePath(): string;
}
