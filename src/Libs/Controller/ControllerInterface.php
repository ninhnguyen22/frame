<?php

namespace Nin\Libs\Controller;

interface ControllerInterface
{
    public function getControllerName(): string;

    public function getActionName(): string;

}
