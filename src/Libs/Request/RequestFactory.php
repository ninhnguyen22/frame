<?php

namespace Nin\Libs\Request;

use Symfony\Component\HttpFoundation\FileBag;
use Symfony\Component\HttpFoundation\HeaderBag;
use Symfony\Component\HttpFoundation\InputBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ServerBag;

/**
 * Class RequestFactory
 * @package Nin\Libs\Request
 */
class RequestFactory extends Request implements RequestContract
{
    public function boot()
    {
        return $this->createFromGlobals();
    }

    /**
     * @return InputBag
     */
    public function post(): InputBag
    {
        return $this->request;
    }

    public function query(): InputBag
    {
        return $this->query;
    }

    public function cookie(): InputBag
    {
        return $this->cookies;
    }

    public function files(): FileBag
    {
        return $this->files;
    }

    public function server(): ServerBag
    {
        return $this->server;
    }

    public function headers(): HeaderBag
    {
        return $this->headers;
    }
}
