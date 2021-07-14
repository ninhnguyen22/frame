<?php

namespace Nin\Libs\Exceptions;

use Throwable;

interface ExceptionHandleContract
{
    public function report(Throwable $e);

    public function render(Throwable $e);
}
