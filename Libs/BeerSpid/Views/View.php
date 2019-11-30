<?php

namespace Website\Libs\BeerSpid\Views;

use Website\Libs\BeerSpid\Views\Contracts\IView;

class View implements IView
{
    private $path;
    private $name;

    function __construct() {}

    public function setPath($path): IView
    {
        $this->path = $path;
        return $this;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): IView
    {
        $this->name = $name;
        return $this;
    }
}