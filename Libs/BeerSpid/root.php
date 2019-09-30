<?php

define("__BEER_SPID_BASE_PATH__", __DIR__);



$container = new DIContainer();

$container->register(new DIRessource::default(ITestClass::class, TestClass::class, ["bonjour test"]));
$container->registerSingle(new DIRessource::single(TestClass::class, ["bonjour test"]))
$container->get(ITestClass::class);
