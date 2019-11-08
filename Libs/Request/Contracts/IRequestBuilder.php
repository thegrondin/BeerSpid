<?php

namespace Website\Libs\BeerSpid\Request\Contracts;

use Website\Libs\BeerSpid\DependencyInjection\DIContainer;
use Website\Libs\BeerSpid\Router\Contracts\IRoute;
use Website\Libs\Request\Bags\BagBuilder;

interface IRequestBuilder {
    function __construct(IRequest $request, DIContainer $container);
    public function create(IRoute $route): IRequest;
}