<?php

class Boostrap implements IBoostrap {

    public function initialize() {

    }

    public function registerRessources(array $additionalRessources) {

        $container = new DIContainer();

        $ressources = array_merge(json_decode(Config::get("dependencies.json"), true), $additionalRessources);

        foreach ($ressources as $dependency) {
            $container->register(/*Reflexion class with parameters*/);
        }
    }

    public function start() {

    }
}
