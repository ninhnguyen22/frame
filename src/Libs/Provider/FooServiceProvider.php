<?php

namespace Nin\Libs\Provider;

use Nin\Repositories\FooRepository;
use Nin\Repositories\FooRepositoryInterface;
use Nin\Services\FooService;
use Nin\Services\FooServiceInterface;

class FooServiceProvider extends AbstractServiceProvider
{
    public $bindings = [
        FooServiceInterface::class => FooService::class,
        FooRepositoryInterface::class => FooRepository::class
    ];

    public function boot()
    {

    }

}
