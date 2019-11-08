<?php


namespace Website\Libs\Request;


use Website\Libs\Request\Contracts\IParameter;

class ParametersCollection implements \IParametersCollection
{

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
    }

    public function all(string $filter): array
    {
        // TODO: Implement all() method.
    }
}