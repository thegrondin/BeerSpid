<?php

namespace Website\Libs\BeerSpid\Router;

use Website\Libs\BeerSpid\DependencyInjection\DIContainer;
use Website\Libs\BeerSpid\Router\Contracts\IRouter;
use Website\Libs\BeerSpid\Router\Contracts\IRouteCollection;
use Website\Libs\BeerSpid\Libs\Url;

class Router implements IRouter {

	private $container;
	private $routesCollections = [];

	private $toDispath;

    public function dispatch(string $path)
    {
        $path = Url::toPretty($path);

        foreach ($this->routesCollections as $collection) {
            foreach ($collection->getRoutes() as $route) {
                if ($path === $route->getPath()) {
                    $this->toDispath = $route;
                }
            }
        }

        if ($this->toDispath) {
            dump($this->toDispath);
        }
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