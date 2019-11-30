<?php

namespace Website\Libs\BeerSpid\DependencyInjection;

class DIRessource {

    private $interface;
    private $pointer;
    private $parameters;

    function __construct() {

    }

    public static function single(string $pointer, array $parameters = []) {
        $instance = new self();
        $instance->pointer = $pointer;
        $instance->parameters = $parameters;
        return $instance;
    }

    public static function default(string $interface, string $pointer, array $parameters = []) {
        $instance = new self();
        $instance->interface = $interface;
        $instance->pointer = $pointer;
        $instance->parameters = $parameters;
        return $instance;
    }

    public function getInterface() : string {
        return $this->interface;
    }

    public function getPointer() : string {
        return $this->pointer;
    }

    public function getParameters() : array {
        return $this->parameters;
    }

    public function setParameters(array $parameters) {
		$this->parameters = $parameters;
	}
}
