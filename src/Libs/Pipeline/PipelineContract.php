<?php

namespace Nin\Libs\Pipeline;

interface PipelineContract
{
    public function addPipe(PipelineContract $handler): PipelineContract;

    public function handle($ob);
}
