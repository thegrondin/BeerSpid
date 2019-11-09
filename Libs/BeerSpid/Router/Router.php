<?php

namespace Website\Libs\BeerSpid\Router;

use ReflectionClass;
use Website\Libs\BeerSpid\DependencyInjection\DIContainer;
use Website\Libs\BeerSpid\Libs\Path;
use Website\Libs\BeerSpid\Request\Contracts\IRequest;
use Website\Libs\BeerSpid\Request\Contracts\IRequestBuilder;
use Website\Libs\BeerSpid\Router\Contracts\IRouter;
use Website\Libs\BeerSpid\Router\Contracts\IRoute;
use Website\Libs\BeerSpid\Router\Contracts\IRouteCollection;
use Website\Libs\BeerSpid\Libs\Url;

class Router implements IRouter {

	/** @var DIContainer */
	private $container;
	private $routesCollections = [];

	private $toDispath;

	function __construct() {

	}

    public function dispatch(string $path)
    {

        $path = Url::toPretty($path);

        foreach ($this->routesCollections as $collection) {

            foreach ($collection->getRoutes() as $route) {
                if ($path === ((object) $route)->getPath()) {
                    $this->toDispath = $route;
                }
            }
        }

        if ($this->toDispath) {


            $requestBuilder = (object) $this->container->getInstance(IRequestBuilder::class);
			$request = (object) $requestBuilder->create($this->toDispath);

			$request->handleDispatch();


            /*if (!in_array(Request::getType(), $this->toDispath->getTypes())) {
                return;
            }




            $controller = $this->container->getInstance($this->toDispath->getController());

            $method = $this->toDispath->getMethod();

            $controller->$method();*/
        }
    }

    public function addCollection(IRouteCollection $collection)
    {
    	$this->routesCollections[] = $collection;
    }

    public function setDIContainer(DIContainer $container)
    {
        $this->container = $container;
    }
}
