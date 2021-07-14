<?php

namespace Nin\Libs\View;

class PageRenderer
{
    protected ViewFactory $view;

    public function __construct(ViewFactory $view)
    {
        $this->view = $view;
    }

    public function render($arguments)
    {
        $pageTemplate = $this->view->getPageTemplate();
        $viewPath = $pageTemplate->getStringTemplate();

        // render title
        // render content
        // ...
        return $this->view->getRenderer()->render($viewPath, $arguments);
    }
}
