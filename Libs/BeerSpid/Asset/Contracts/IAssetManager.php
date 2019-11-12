<?php


namespace Website\Libs\BeerSpid\Asset\Contracts;


interface IAssetManager
{
    function __construct();
    public function isAsset(string $requestUri) : bool;
    public function handle(string $requestUri);
    public function exists(string $path) : bool;
}