<?php

namespace Website\Libs\BeerSpid\Bootstrapper\Contracts;

interface IBootstrap {
    public function initializeConstants($config);
    public function initializeRoutes($config);
    public function registerRessources($config, array $ad);
    public function start();
}