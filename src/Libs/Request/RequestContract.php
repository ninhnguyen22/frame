<?php

namespace Nin\Libs\Request;

use Symfony\Component\HttpFoundation\FileBag;
use Symfony\Component\HttpFoundation\HeaderBag;
use Symfony\Component\HttpFoundation\InputBag;
use Symfony\Component\HttpFoundation\ServerBag;

interface RequestContract
{
    public function post(): InputBag;

    public function query(): InputBag;

    public function cookie(): InputBag;

    public function files(): FileBag;

    public function server(): ServerBag;

    public function headers(): HeaderBag;
}
