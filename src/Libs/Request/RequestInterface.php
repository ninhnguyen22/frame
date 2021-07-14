<?php

namespace Nin\Libs\Request;

use Symfony\Component\HttpFoundation\Request;

interface RequestInterface
{
    public function getBaseUrl();

    public function getPathInfo();

    public function getMethod();

    public function getQueryString();

    public function getParameters();

    public function getParameter(string $name);

    public function hasParameter(string $name);

    public function fromRequest(Request $request);

}
