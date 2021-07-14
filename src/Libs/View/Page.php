<?php

namespace Nin\Libs\View;

class Page
{
    /*
     * For Abstract Factory pattern
     *
     * public function render(ViewFactory $factory, $arguments): string
    {
        $renderer = $factory->getRenderer();
        $pageTemplate = $factory->getPageTemplate();
        $viewPath = $pageTemplate->getStringTemplate();
        return $renderer->render($viewPath, $arguments);
    }*/

    protected PageRenderer $pageRenderer;

    public function __construct(PageRenderer $pageRenderer)
    {
        $this->pageRenderer = $pageRenderer;
    }

    public function render($arguments)
    {
        return $this->pageRenderer->render($arguments);
    }
}
