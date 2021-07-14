<?php

namespace Nin\Libs\View;

class TwigPageTemplate implements PageTemplate
{
    public function getStringTemplate(): string
    {
        return "index.html";
    }
}
