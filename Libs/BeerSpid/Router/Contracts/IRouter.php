<?php

namespace Website\Libs\BeerSpid\Router\Contracts;

use Website\Libs\BeerSpid\DependencyInjection\DIContainer;



interface IRouter {
    function __construct();
    public function dispatch(string $path);
    public function addCollection(IRouteCollection $routes);
    public function setDIContainer(DIContainer $container);
}
