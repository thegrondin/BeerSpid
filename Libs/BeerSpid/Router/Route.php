<?php

namespace Website\Libs\BeerSpid\Router;

use Website\Libs\BeerSpid\Router\Contracts\IController;
use \Website\Libs\BeerSpid\Router\Contracts\IRoute;

class Route implements IRoute {

    public function getName(): string
    {
        // TODO: Implement getName() method.
    }

    public function getMethod(): string
    {
        // TODO: Implement getMethod() method.
    }

    public function getPath(): string
    {
        // TODO: Implement getPath() method.
    }

    public function getParentName(): string
    {
        // TODO: Implement getParentName() method.
    }

    public function getController(): IController
    {
        // TODO: Implement getController() method.
    }

    public function setName(string $name): IRoute
    {
        // TODO: Implement setName() method.
    }

    public function setMethod(string $method): IRoute
    {
        // TODO: Implement setMethod() method.
    }

    public function setPath(string $path): IRoute
    {
        // TODO: Implement setPath() method.
    }

    public function setParentName(string $parentName): IRoute
    {
        // TODO: Implement setParentName() method.
    }

    public function setController(IController $controller): IRoute
    {
        // TODO: Implement setController() method.
    }
}