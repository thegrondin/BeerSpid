<?php


namespace Website\Libs\BeerSpid\DependencyInjection;


use mysql_xdevapi\Exception;
use ReflectionClass;
use Symfony\Component\Debug\Exception\ClassNotFoundException;

class DIContainer {

    protected $autowire;
    private $ressources = [];

    function __construct(bool $autowire = true) {
      $this->autoWire = $autowire;
    }

    public function register(DIRessource $ressource) {
        array_push($this->ressources, $ressource);
    }

    public function getInstance($interface, array $override = []) {
        $targetedRessource = array_filter($this->ressources, function(DIRessource $ressource) use ($interface) {

            return $ressource->getInterface() === $interface;
        });

    if (!$targetedRessource) {
      $_ENV["ERROR_VARS"] = $this->ressources;
      throw new \Exception('The reference to ' . $interface . ' do not seem to be registered');
    }

		$targetedRessource = end($targetedRessource);

		$reflectionClass = new ReflectionClass($targetedRessource->getPointer());

    return $this->autoWire($reflectionClass);

		//return $reflectionClass->newInstanceArgs($targetedRessource->getParameters());
    }

    protected function autoWire(ReflectionClass $class) {
      if ($class->isInstantiable()) {
        $constructor = $class->getConstructor();

        foreach ($constructor->getParameters() as $param) {
          if ($param->getClass()) {
            $instance = $this->getInstance($param->getClass());
            $this->autoWire($instance);

          }
        }

        dump(get_class_methods($constructor->getParameters()[0]));
        dump($constructor->getParameters()[1]->getClass());
      }
    }


}
