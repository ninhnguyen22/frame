<?php

namespace Nin\Libs\Exceptions;

use Throwable;

class ExceptionHandle extends AbstractExceptionHandle implements ExceptionHandleContract
{
    /**
     * Report
     *
     * @param Throwable $e
     * @throws Throwable
     */
    public function report(Throwable $e)
    {
        parent::report($e);
    }

    public function render(Throwable $e)
    {
        parent::render($e);
    }
}
