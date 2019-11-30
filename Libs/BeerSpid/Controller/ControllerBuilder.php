<?php

namespace Website\Libs\BeerSpid\Controller;

use ReflectionMethod;
use Website\Libs\BeerSpid\Controller\Contracts\IController;
use Website\Libs\BeerSpid\Controller\Contracts\IControllerBuilder;
use Website\Libs\BeerSpid\DependencyInjection\DIContainer;
use Website\Libs\BeerSpid\Request\Contracts\IRequest;
use Website\Libs\BeerSpid\Router\Contracts\IRoute;

class ControllerBuilder implements IControllerBuilder {

    protected $container;
    function __construct(DIContainer $container)
    {
        $this->container = $container;
    }

    public function create(IRoute $route, IRequest $request): IController
    {
        $controller = $this->container->getInstance($route->getController());

        $method = $route->getMethod();

        $controller->$method($request, ...array_values($route->getParameters()));

        return $controller;
    }
}