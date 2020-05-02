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

$newCloneRedis->set('myKey1', 'myValue1');
$newCloneRedis->set('myKey2', 'myValue2');
$newCloneRedis->set('myKey3', 'myValue3');

$newCloneRedis->__unset('myKey3', 'myValue3');

$keyExists = $newCloneRedis->exists('myKey6');

getCodeView($keyExists);

getCodeView($newCloneRedis->viewStore());

$newCloneRedis->set('value', 10);
$myKeyOutput = $newCloneRedis->get('value');

getCodeView($myKeyOutput);
