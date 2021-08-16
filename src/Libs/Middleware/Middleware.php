<?php

namespace Nin\Libs\Middleware;

use Nin\Libs\Pipeline\Pipeline;

/**
 * Class Middleware
 * @package Nin\Libs\Middleware
 */
class Middleware extends Pipeline implements MiddlewareContract
{
    /**
     * Handle pipe task
     *
     * @param $request
     * @return mixed
     */
    public function handle($request)
    {
        if (isset($this->nextPipe)) {
            return $this->nextPipe->handle($request);
        }

        return true;
    }
}
