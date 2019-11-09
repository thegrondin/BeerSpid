<?php


namespace Website\Libs\BeerSpid\DependencyInjection;


use ReflectionClass;
use Symfony\Component\Debug\Exception\ClassNotFoundException;

class DIContainer {

    protected $autowire;
    private $ressources = [];

    function __construct(bool $autowire = true) {
      $this->autoWire = $autowire;
    }

    public function register(DIRessource $ressource) {
        $this->ressources[] = $ressource;

    }

    public function getInstance($interface, array $override = []) {
		$_ENV['ERROR_DEV'] = $this->ressources;
        $targetedRessource = array_filter($this->ressources, function(DIRessource $ressource) use ($interface) {

            return $ressource->getInterface() === $interface;
        });

		if (!$targetedRessource) {

	  		throw new \Exception('The reference to ' . $interface . ' do not seem to be registered');
		}


		$targetedRessource = end($targetedRessource);

		if (count($override)) {
			$targetedRessource->setParameters($override);
		}

    	return $this->autoWire($targetedRessource);

    }

    protected function autoWire(DIRessource $targetedRessource) {

    	if ($targetedRessource->getPointer() === self::class) {
			return $this;
		}

    	if (!class_exists($targetedRessource->getPointer())) {
			throw new \Exception('Unable to find class ' . $targetedRessource->getPointer() . '.');
		}

    	$class = new ReflectionClass($targetedRessource->getPointer());

		if ($class->isInstantiable()) {
			$constructor = $class->getConstructor();

			$classParameters = [];
			$autoWiredIndex = 0;
			foreach ($constructor->getParameters() as $index => $param) {

				$instanceParam = null;

				if (!$param->getClass() && isset($targetedRessource->getParameters()[$index - $autoWiredIndex])) {
					$configParam = $targetedRessource->getParameters()[$index - $autoWiredIndex];

					if ($this->getNormalizedType($configParam) === $param->getType()->getName()) {
						$instanceParam = $targetedRessource->getParameters()[$index - $autoWiredIndex];
					}
				}

				if ($param->getType() && !$param->getClass()) {

					settype($instanceParam, $param->getType()->getName());
				}

				if ($param->getClass()) {
					$instanceParam = $this->getInstance($param->getClass()->getName());
					$autoWiredIndex++;
				}

				$classParameters[] = $instanceParam;

			}

			return $class->newInstanceArgs($classParameters);

		}
    }

    protected function getNormalizedType($var) {

    	$type = gettype($var);

    	$returnType = null;
    	switch ($type) {
			case Types::INT:
			case Types::INTEGER:
				$type = 'int';
				break;
			case Types::BOOL:
			case Types::BOOLEAN:
				$type = 'bool';
				break;
		}

		return $type;
	}

}


class Types {
	const INTEGER = 'integer';
	const BOOLEAN = 'boolean';
	const INT = 'int';
	const BOOL = 'bool';
}