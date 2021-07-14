<?php

namespace Nin\Libs\Routing;

/**
 * Interface RouterConfigContract
 * @package Nin\Libs\Routing
 */
interface RouterConfigContract
{
    /**
     * Get route configure directory
     *
     * @return string
     */
    public function getDir(): string;

    /**
     * Get route configure file
     *
     * @return string
     */
    public function getFile(): string;
}
