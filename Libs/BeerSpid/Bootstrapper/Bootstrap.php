<?php

namespace Website\Libs\BeerSpid\Bootstrapper;

use Website\Libs\BeerSpid\DependencyInjection\DIContainer;
use Website\Libs\BeerSpid\DependencyInjection\DIRessource;
use Website\Libs\BeerSpid\Router\Contracts\IRouteCollection;
use Website\Libs\BeerSpid\Router\Contracts\IRouter;
use Website\Libs\BeerSpid\Router\Contracts\IRoute;
use Website\Libs\BeerSpid\Bootstrapper\Contracts\IBootstrap;

class Bootstrap {

    private $container;
    private $router;
    private $ressourcesRegistered;

    function __construct() {
        $this->container = new DIContainer();
        $this->ressourcesRegistered = false;
    }

    public function initializeConstants($config) {
    	foreach ($config as $constName => $constValue) {
    		define($constName, $constValue);
		}
    }

    public function initializeRoutes($collections = []) {

        $this->router = $this->container->getInstance(IRouter::class);

        if (!$this->ressourcesRegistered) {
            return;
        }

        foreach ($collections as $collection) {
            $routeCollection = $this->container->getInstance(IRouteCollection::class);

            $routeCollection->setName($collection->name);
            $routeCollection->setController($collection->controller);

            foreach ($collection->routes as $route) {
                $routeEntity = $this->container->getInstance(IRoute::class);

				$routeEntity
					->setName($route->name)
					->setMethod($route->method)
					->setPath($route->path)
					->setParentName($collection->name);

                $routeCollection->add($routeEntity);
            }

            $this->router->addCollection($routeCollection);

        }

        $this->router->setDIContainer($this->container);
    }

    public function registerRessources($config = [], array $additionalRessources = []) {

    	$ressources = array_merge($config, $additionalRessources);

        foreach ($ressources as $dependency) {

            $this->container->register((DIRessource::default($dependency->interface, $dependency->class, $dependency->parameters)));
        }

        $this->ressourcesRegistered = true;
    }

    public function start() {
        $this->router->dispatch($_SERVER["REQUEST_URI"]);
    }
}
