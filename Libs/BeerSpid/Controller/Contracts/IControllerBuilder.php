<?php


namespace Website\Libs\BeerSpid\Controller\Contracts;


use Website\Libs\BeerSpid\DependencyInjection\DIContainer;
use Website\Libs\BeerSpid\Request\Contracts\IRequest;
use Website\Libs\BeerSpid\Router\Contracts\IRoute;

interface IControllerBuilder
{
    function __construct(DIContainer $container);

    public function create(IRoute $route, IRequest $request): IController;
}