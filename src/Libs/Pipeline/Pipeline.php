<?php

namespace Nin\Libs\Pipeline;

class Pipeline implements PipelineContract
{
    /**
     * @var
     */
    private $passable;

    /**
     * @var PipelineContract
     */
    protected PipelineContract $nextPipe;

    /**
     * Add next pipe task
     * @param PipelineContract $handler
     * @return PipelineContract
     */
    public function addPipe(PipelineContract $handler): PipelineContract
    {
        $this->nextPipe = $handler;

        return $handler;
    }

    /**
     * Handle pipe task
     * @param $ob
     * @return mixed
     */
    public function handle($ob)
    {
        if (isset($this->nextPipe)) {
            return $this->nextPipe->handle($ob);
        }

        return $ob;
    }

    /**
     * Seng passble
     *
     * @param $passable
     * @return $this
     */
    public function send($passable)
    {
        $this->passable = $passable;

        return $this;
    }

    /**
     * Run pipeline and return passple
     *
     * @return mixed
     */
    public function thenReturn()
    {
        return $this->handle($this->passable);
    }

    /**
     * Run pipeline with a final pipe task
     *
     * @param \Closure $callback
     * @return mixed
     */
    public function then(\Closure $callback)
    {
        $passable = $this->handle($this->passable);
        return $callback($passable);
    }
}
