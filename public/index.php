<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

// $helloWorld = new \ExampleApp\HelloWorld();
// $helloWorld->announce();

$newCloneRedis = new \ExampleApp\CloneRedis();

var_dump($newCloneRedis);
