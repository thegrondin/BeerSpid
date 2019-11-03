<?php

namespace Website\Libs\BeerSpid\Router;

use Website\Libs\BeerSpid\Router\Contracts\IRoute;
use Website\Libs\BeerSpid\Router\Contracts\IRouteCollection;
use Website\Libs\BeerSpid\Router\Contracts\RouteSearch;

class RouteCollection implements IRouteCollection {

    private $routes = [];

    private $name;
    private $controller;

    public function add(IRoute $route)
    {
        array_push($routes, $route);
    }

    public function remove(IRoute $route)
    {

    }

    public function update(IRoute $route)
    {
        // TODO: Implement update() method.
    }

    public function getRoute(RouteSearch $search, $term): IRoute
    {
        $result = null;

        switch ($search) {
            case RouteSearch::METHOD :
                $result = $this->getByMethod($search); break;
            case RouteSearch::NAME :
                $result = $this->getByName($search); break;
            case RouteSearch::PATH :
                $result = $this->getByPath($search); break;
            default:
                throw new \Exception('Unexpected value');
        }

        return $result[0];
    }

    protected function getByName(string $name): array {

    }

    protected function getByMethod(string $method): array {

    }

    protected function getByPath(string $path): array {

    }

    public function getSelf(): array
    {
        return (array)$this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setController(string $controller)
    {
        $this->controller = $controller;
    }
}