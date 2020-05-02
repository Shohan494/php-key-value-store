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


$newCloneRedis->set('value', 10);
$newCloneRedis->increment('value', 10);

$myKeyOutput = $newCloneRedis->get('value');

$newCloneRedis->increment('value1', 10);

$myKeyOutput = $newCloneRedis->get('value1');

getCodeView($myKeyOutput);

$newCloneRedis->increment('myKey1', 10);

$newCloneRedis->delete('myKey2');

$newCloneRedis->increment('myKey1', 10);
$newCloneRedis->increment('myKey1');

$newCloneRedis->increment('newKey');

getCodeView($newCloneRedis->viewStore());
