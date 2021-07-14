<?php

namespace Nin\Libs\Controller;

/**
 * Interface ControllerContract
 * @package Nin\Libs\Controller
 */
interface ControllerContract
{
    public function getControllerName(): string;

    public function getActionName(): string;

}
