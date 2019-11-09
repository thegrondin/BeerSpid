<?php


namespace Website\Libs\BeerSpid\Request;


use Website\Libs\BeerSpid\Request\Contracts\IParameter;
use Website\Libs\BeerSpid\Request\Contracts\IParametersCollection;

class ParametersCollection implements IParametersCollection
{

	protected $rawGet = [];
	protected $rawPost = [];

    public function get(string $name): IParameter
    {
        // TODO: Implement get() method.
    }

    public function post(string $name): IParameter
    {
        // TODO: Implement post() method.
    }

    public function __construct(array $rawGetParams, array $rawPostParams)
    {
    	$this->rawGet = $rawGetParams;
    	$this->rawPost = $rawPostParams;
    }

    public function all(string $filter): array
    {
        // TODO: Implement all() method.
    }
}