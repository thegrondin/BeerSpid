<?php
namespace Website\Libs\BeerSpid\DependencyInjection;

class DIContainer {

    function __construct() {

    }
    private $ressources = [];

    public function register(DIRessource $ressource) {
        array_push($this->ressources, $ressource);
    }

    public function getInstance($interface) {
        $targetedRessource = array_filter($this->ressources, function($ressource) use ($interface) {
            return $ressource->getInterface() === $interface;
        })[0];

        $obj = null;
        if (count($targetedRessource->getParameters()) == 0) {
            $obj = new $targetedRessource->getPointer();
        }
        else {
            $reflectionClass = new \ReflectionClass($targetedRessource->getPointer());
            $obj = $reflectionClass->newInstanceArgs($targetedRessource->getParameters());
        }

        return $obj;

    }

}
