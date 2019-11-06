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
        $targetedRessource = array_filter($this->ressources, function(DIRessource $ressource) use ($interface) {

            return $ressource->getInterface() === $interface;
        });

		$targetedRessource = end($targetedRessource);

		$reflectionClass = new \ReflectionClass($targetedRessource->getPointer());
		return $reflectionClass->newInstanceArgs($targetedRessource->getParameters());



    }

}
