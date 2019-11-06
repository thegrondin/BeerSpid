<?php

namespace Website\Libs\BeerSpid\Router\Contracts;

interface IRouteCollection {
    public function getName(): string;
    public function getController(): string;
    public function setName(string $name);
    public function setController(string $controller);
    public function add(IRoute $route);
    public function remove(IRoute $route);
    public function update(IRoute $route);
    public function getRoute(RouteSearch $search, $term): IRoute;
    public function getSelf(): array;
}