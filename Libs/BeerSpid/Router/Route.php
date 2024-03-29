<?php

namespace Website\Libs\BeerSpid\Router;

use Website\Libs\BeerSpid\Router\Contracts\IController;
use \Website\Libs\BeerSpid\Router\Contracts\IRoute;
use Website\Libs\BeerSpid\Router\Contracts\IRouteCollection;

class Route implements IRoute {

	private $name;
	private $method;
	private $path;
	private $parentName;
	private $controller;
	private $types = [];
    private $parameters = [];

	function __construct() {  }

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

    public function getController(): string
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

    public function setController(string $controller): IRoute
    {
        $this->controller = $controller;
		return $this;
    }

    public function getTypes(): array
    {
        return $this->types;
    }

    public function setTypes(array $types): IRoute
    {
        $this->types = $types;
        return $this;
    }

    public function getParameters() : array  {
        return $this->parameters;
    }

    public function setParameters(array $parameters) : IRoute {
        $this->parameters = $parameters;
        return $this;
    }

    public function setParameterValue($infos, $value) : IRoute {
        $index = array_search($infos, $this->parameters);

        if ($index !== false) {

            list($name, $type) = explode('|', $infos);

            $result = null;

            if (settype($value, $type)) {
                $result = $value;
            }

            $this->parameters[$name] = $value;
            unset($this->parameters[$index]);
        }

        return $this;
    }
}