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

//$newListRedis = new \ExampleApp\ListRedis();


$newCloneRedis = new \CactusPhpRedis\CloneRedis();

//$newCloneRedis->set('myKey1');
//$newCloneRedis->set('myKey1', 'myValue1');


//$newCloneRedis->set('myList', array()); // PROBABLY NOT RIGHT WAY


//$newCloneRedis->set('myKey3');


$rpushResult = $newCloneRedis->rpush('friends', 'shohanR');
$lpushResult = $newCloneRedis->lpush('friends', 'shohanL');
$lpushResult = $newCloneRedis->lpush('friends', 'shohanLast');

getCodeView($lpushResult);



// $newCloneRedis->set('myKey3', 'myValue3');
//
// $newCloneRedis->__unset('myKey3', 'myValue3');
//
// $keyExists = $newCloneRedis->exists('myKey6');
//
// getCodeView($keyExists);
//
//
// $newCloneRedis->set('value', 10);
// $newCloneRedis->increment('value', 10);
//
// $myKeyOutput = $newCloneRedis->get('value');
//
// $newCloneRedis->increment('value1', 10);
//
//$myKeyOutput = $newCloneRedis->get('myKey1');
//
// getCodeView($myKeyOutput);
//
// $newCloneRedis->increment('myKey1', 10);
//
// $newCloneRedis->delete('myKey2');
//
// $newCloneRedis->increment('myKey1', 10);
// $newCloneRedis->increment('myKey1');
//
// $newCloneRedis->increment('newKey');
// getCodeView($newCloneRedis->viewStore());
//
//
// $newCloneRedis->decrement('myKey1', 10);
// $newCloneRedis->decrement('myKey1');
//
// $newCloneRedis->decrement('totalNewKey', 5);
//
//getCodeView($newCloneRedis->viewStore());
