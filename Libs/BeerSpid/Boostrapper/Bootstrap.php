<?php

namespace Website\Libs\BeerSpid\Bootstrapper;

use Website\Libs\BeerSpid\DependencyInjection\DIContainer;
use Website\Libs\BeerSpid\DependencyInjection\DIRessource;
use Website\Libs\BeerSpid\Router\contracts\IRouteCollection;
use Website\Libs\BeerSpid\Router\contracts\IRouter;
use Website\Libs\BeerSpid\Router\contracts\IRoute;

use Website\Libs\BeerSpid\Bootstrapper\Contracts\IBootstrap;

class Boostrap implements IBootstrap {

    private $container;
    private $router;
    private $ressourcesRegistered;

    function __construct() {
        $this->container = new DIContainer();
        $this->ressourcesRegistered = false;
    }

    public function initializeConstants($config, string $baseDir) {

    }

    public function initializeRoutes($collections = []) {

        $this->router = $this->container->getInstance(IRouter::class);

        if (!$this->ressourcesRegistered) {
            return;
        }

        foreach ($collections as $collection) {
            $routeCollection = $this->container->getInstance(IRouteCollection::class);

            $routeCollection->setName($collection['name']);
            $routeCollection->setController($collection['controller']);

            foreach ($collection['routes'] as $route) {
                $routeEntity = $this->container->getInstanceWithOverrideParameters(IRoute::class, [
                    'name' => $route['name'],
                    'method' => $route['method'],
                    'path' => $route['path']
                ]);

                $routeCollection->add($routeEntity);
            }

            $this->router->addCollection($routeCollection);
        }

        $this->router->setDIContainer($this->container);
    }

    public function registerRessources($config = [], array $additionalRessources = null) {

        $ressources = array_merge(json_decode($config, $additionalRessources));

        foreach ($ressources as $dependency) {
            $this->container->register((DIRessource::default($dependency['interface'], $dependency['class'], $dependency['parameters'])));
        }

        $this->ressourcesRegistered = true;
    }

    public function start() {
        $this->router->dispatch($_SERVER["REQUEST_URI"]);
    }
}
