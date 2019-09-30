<?php

class Boostrap implements IBoostrap {

    private $container;
    private $router;
    private $ressourcesRegistered;

    function __construct() {
        $this->container = new DIContainer();
        $this->router = $this->container->getInstance(IRouter::class);
        $this->ressourcesRegistered = false;
    }

    public function initialize() {

    }

    public function initializeRoutes() {

        if (!$this->ressourcesRegistered) {
            return;
        }

        $routeCollection = $this->container->getInstance(IRouteCollection::class);

        $routes = json_decode(Config::get('routes.json'), true);
        foreach ($routes as $route) {
            $routeCollection->add($route);
        }
        $this->router->addRoutes($routeCollection);

    }

    public function registerRessources(array $additionalRessources) {

        $ressources = array_merge(json_decode(Config::get("dependencies.json"), true), $additionalRessources);

        foreach ($ressources as $dependency) {
            $this->container->register((DIRessource::default($dependency['interface'], $dependency['class'], $dependency['parameters']));
        }

        $this->ressourcesRegistered = true;
    }

    public function start() {
        $this->router->dispatch($_SERVER["REQUEST_URI"]);
    }
}
