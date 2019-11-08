<?php


namespace Website\Libs\Request\Bags;


use Website\Libs\BeerSpid\Request\Contracts\Bags\IBag;
use Website\Libs\BeerSpid\Request\Contracts\Elements\IElement;

class Bag implements IBag
{

    public function add(IElement $el): void
    {
        // TODO: Implement add() method.
    }

    public function addBunch(array $elements): void
    {
        // TODO: Implement addBunch() method.
    }

    public function get(): IElement
    {
        // TODO: Implement get() method.
    }

    public function getAll(): array
    {
        // TODO: Implement getAll() method.
    }
}