<?php

namespace Website\Libs\BeerSpid\Bootstrapper;

use Website\Libs\BeerSpid\Asset\Contracts\IAssetManager;
use Website\Libs\BeerSpid\DependencyInjection\DIContainer;
use Website\Libs\BeerSpid\DependencyInjection\DIRessource;
use Website\Libs\BeerSpid\Libs\Directory;
use Website\Libs\BeerSpid\Libs\File;
use Website\Libs\BeerSpid\Router\Contracts\IRouteCollection;
use Website\Libs\BeerSpid\Router\Contracts\IRouter;
use Website\Libs\BeerSpid\Router\Contracts\IRoute;
use Website\Libs\BeerSpid\Bootstrapper\Contracts\IBootstrap;

class Bootstrap {

	/*
	 *
	 */
    private $container;
    /*
     * @var $IRouter
     */
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

    public function initializeRoutes($directory) {

        $this->router = (object) $this->container->getInstance(IRouter::class);

        $files = Directory::getFiles($directory);
        $collections = [];

        foreach ($files as $index => $file) {

            $collections[] = File::parseToJson(File::getContent($file));
        }

        foreach ($collections as $collection) {

            $routeCollection = (object) $this->container->getInstance(IRouteCollection::class);
            $routeCollection->setName($collection->name);
            $routeCollection->setController($collection->controller);

            foreach ($collection->routes as $route) {
                $routeEntity = (object) $this->container->getInstance(IRoute::class);

                preg_match_all('/[^{\}]+(?=})/', $route->path, $output);

                if (count($output[0]) > 0) {
                    $routeEntity->setParameters($output[0]);
                    $routeEntity->setPath(substr($route->path, 0, strpos($route->path, '{')));
                }
                else {
                    $routeEntity->setPath($route->path);
                }

				$routeEntity
					->setName($route->name)
					->setMethod($route->method)
					->setParentName($collection->name)
                    ->setController($collection->controller)
                    ->setTypes($route->type);

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

        $requestUri = $_SERVER["REQUEST_URI"];

        $assetManager = $this->container->getInstance(IAssetManager::class);

        if ($assetManager->exists($requestUri)) {
            return $assetManager->handle($requestUri);
        }

        return $this->router->dispatch($requestUri);
    }
}
