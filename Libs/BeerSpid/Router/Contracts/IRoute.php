<?php

namespace Website\Libs\BeerSpid\Router\Contracts;

interface IRoute {
	function __construct() ;

	public function getName() : string;
    public function getMethod(): string;
    public function getPath(): string;
    public function getParentName(): string;
    public function getController(): string;
    public function getTypes(): array;
    public function getParameters() : array;

    public function setName(string $name): IRoute;
    public function setMethod(string $method): IRoute;
    public function setPath(string $path): IRoute;
    public function setParentName(string $parentName): IRoute;
    public function setController(string $controller): IRoute;
    public function setTypes(array $types): IRoute;
    public function setParameters(array $params) : IRoute;
    public function setParameterValue($name, $value) : IRoute;
}