<?php

namespace Nin\Libs\Cache;

abstract class AdapterFactory
{
    abstract public function getInstance(): AdapterInterface;
}
