<?php

namespace Website\Libs\BeerSpid\Router;

use Website\Libs\BeerSpid\Router\Contracts\IController;
use \Website\Libs\BeerSpid\Router\Contracts\IRoute;

class Route implements IRoute {

	private $name;
	private $method;
	private $path;
	private $parentName;
	private $controller;

    public function getName(): string
    {
        return $this->name;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getPath(): string
	{
		return $this->path;
    }

    public function getParentName(): string
    {
        return $this->parentName;
    }

    public function getController(): IController
    {
        return $this->controller;
    }

    public function setName(string $name): IRoute
    {
        $this->name = $name;
		return $this;
    }

    public function setMethod(string $method): IRoute
    {
        $this->method = $method;
		return $this;
    }

    public function setPath(string $path): IRoute
    {
        $this->path = $path;
		return $this;
    }

    public function setParentName(string $parentName): IRoute
    {
        $this->parentName = $parentName;
		return $this;
    }

    public function setController(IController $controller): IRoute
    {
        $this->controller = $controller;
		return $this;
    }
}