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

$myKeyOutput = $newCloneRedis->get('myKey2');

getCodeView($myKeyOutput);

getCodeView($newCloneRedis->viewStore());
