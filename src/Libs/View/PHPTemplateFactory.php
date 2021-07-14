<?php

namespace Nin\Libs\View;

class PHPTemplateFactory implements ViewFactory
{
    public function getRenderer(): Renderer
    {
        return new PHPTemplateRenderer();
    }

    public function getPageTemplate(): PageTemplate
    {
        return new PHPPageTemplate();
    }
}
