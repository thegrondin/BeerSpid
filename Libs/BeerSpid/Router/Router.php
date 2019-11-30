<?php

namespace Website\Libs\BeerSpid\Router;

use ReflectionClass;
use Website\Libs\BeerSpid\Controller\Contracts\IControllerBuilder;
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
        $path = Url::normalize(Url::parseUrl($path));

        foreach ($this->routesCollections as $collection) {
            foreach ($collection->getRoutes() as $route) {
                if (strncasecmp($path, ((object) $route)->getPath(), strlen(((object) $route)->getPath())) === 0) {

                    $routesParameters = explode('/', substr($path, strlen(((object) $route)->getPath()),  -1));

                    if (count($routesParameters) === 1 && $routesParameters[0] === "") {
                        array_pop($routesParameters);
                    }

                    if (count($route->getParameters()) === count($routesParameters)) {
                        for ($i = 0; $i < count($routesParameters); $i ++) {
                            $parameter = $route->getParameters()[$i];
                            $route->setParameterValue($parameter, $routesParameters[$i]);
                        }

                        $this->toDispath = $route;
                    }
                }
            }
        }

        if ($this->toDispath) {

            $requestBuilder = (object) $this->container->getInstance(IRequestBuilder::class);
			$request = (object) $requestBuilder->create($this->toDispath);

			if (!$request->isValid()) {
			    return;
            }

			$controllerBuilder = (object) $this->container->getInstance(IControllerBuilder::class);
			$controller = (object) $controllerBuilder->create($this->toDispath, $request);

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
