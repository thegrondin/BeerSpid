<?php

namespace Website\Libs\BeerSpid\Router;

use Website\Libs\BeerSpid\DependencyInjection\DIContainer;
use \Website\Libs\BeerSpid\Router\Contracts\IRouter;
use Website\Libs\BeerSpid\Router\Contracts\IRouteCollection;

class Router implements IRouter {

	private $container;
	private $routesCollections = [];

    public function dispatch(string $path)
    {
        // TODO: Implement dispatch() method.
    }

    public function addCollection(IRouteCollection $collection)
    {
        array_push($this->routesCollections, $collection);
    }

    public function setDIContainer(DIContainer $container)
    {
        $this->container = $container;
    }
}