<?php

namespace Website\Libs\BeerSpid\Router\Contracts;

use Website\Libs\BeerSpid\DependencyInjection\DIContainer;

interface IRouter {
    public function dispatch(string $path);
    public function addCollection(array $routes);
    public function setDIContainer(DIContainer $container);
}