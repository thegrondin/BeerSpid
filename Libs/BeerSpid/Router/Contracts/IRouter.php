<?php

namespace Website\Libs\BeerSpid\Router\Contracts;

use Website\Libs\BeerSpid\DependencyInjection\DIContainer;



interface IRouter {
    function __construct(IRoute $route, IRouteCollection $collection, string $test, int $foo, bool $bar, int $test2, $noType);
    public function dispatch(string $path);
    public function addCollection(IRouteCollection $routes);
    public function setDIContainer(DIContainer $container);
}
