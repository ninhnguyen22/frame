<?php

namespace Nin\Libs\View;

/**
 * The Abstract Factory interface declares creation methods for each distinct
 * product type.
 */
interface ViewFactory
{
    public function make(string $viewPath, $parameters = []);

    public function getTemplateFactory();
}
