<?php

namespace Website\Libs\BeerSpid\Router\Contracts;

interface IRoute {
    public function getName() : string;
    public function getMethod(): string;
    public function getPath(): string;
    public function getParentName(): string;
    public function getController(): IController;

    public function setName(string $name): IRoute;
    public function setMethod(string $method): IRoute;
    public function setPath(string $path): IRoute;
    public function setParentName(string $parentName): IRoute;
    public function setController(IController $controller): IRoute;
}