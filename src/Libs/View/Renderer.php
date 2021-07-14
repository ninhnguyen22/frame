<?php

namespace Nin\Libs\View;

/**
 * The Abstract Factory interface declares creation methods for each distinct
 * product type.
 */
interface Renderer
{
    public function render(string $templateString, array $arguments = []): string;
}
