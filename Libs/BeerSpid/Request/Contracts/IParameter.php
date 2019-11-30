<?php


namespace Website\Libs\BeerSpid\Request\Contracts;


interface IParameter
{
    function __construct(string $name, $value);

    public function getName() : string;
    public function getValue();
}