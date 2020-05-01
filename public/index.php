<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

// $helloWorld = new \ExampleApp\HelloWorld();
// $helloWorld->announce();


function getCodeView($data)
{
  echo "<pre>";
  print_r($data);
  echo "</pre>";
}

$newCloneRedis = new \ExampleApp\CloneRedis();

//var_dump($newCloneRedis->get('keyName'));

var_dump($newCloneRedis->set('myKey', 'myValue'));


getCodeView($newCloneRedis);
