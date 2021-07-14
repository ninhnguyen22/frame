<?php

namespace Nin\Libs\Exceptions;

use Nin\Libs\Container\ApplicationContract;
use Nin\Libs\Logger\LoggerContract;
use Nin\Libs\View\ViewFactory;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Throwable;

abstract class AbstractExceptionHandle
{
    protected ApplicationContract $app;

    public function __construct(ApplicationContract $app)
    {
        $this->app = $app;
    }

    /**
     * Report or log an exception.
     *
     * @param Throwable $e
     * @throws Throwable
     */
    public function report(Throwable $e)
    {
        try {
            $logger = $this->app->make(LoggerContract::class);

            $this->logException($logger, $e);
        } catch (\Exception $ex) {
            throw $e;
        }
    }

    /**
     * Render or log an exception.
     *
     * @param Throwable $e
     * @throws Throwable
     */
    public function render(Throwable $e)
    {
        if ($e instanceof ResourceNotFoundException) {
            // 404
            $template = $this->app->make(ViewFactory::class);
            echo $template->make('vendor/404');
            exit();
        }
        throw $e;
    }

    protected function logException(LoggerContract $logger, Throwable $e)
    {
        $logger->error(
            $e->getMessage(),
            ['exception' => $e]
        );
    }
}
