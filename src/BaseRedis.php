<?php
declare(strict_types=1);

namespace CactusPhpRedis;

class BaseRedis
{
    protected array $data; // key value store / associative array
    private bool $declared = false;

    //private array $list;


    // private - so needed getter setter method here in this class
    // protected array $data;

    public function __construct() {
        $this->data = array();
        //$this->list = array();
        $this->declared = true;
        echo "Base Redis Constructor";
    }

    public function rpush($keyName, $value = null)
    {
        echo "rpush to list";
        //$this->baseKeyExists($keyName) ?  array_push($keyName, $value) : array_push($keyName, $value);
    }

    public function __set($keyName, $value = null)
    {
        echo "setting key or key-value";
        $value = null ?  array_push($this->data, $keyName) : $this->data[$keyName] = $value;
        //array_push($this->data, $keyName);
    }

    public function __get($keyName)
    {
        echo "Getting '$keyName'\n";

        $exists = $this->baseKeyExists($keyName);
        if($exists)
        {
            return $this->data[$keyName];
        }
        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $keyName .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }

    protected function baseKeyExists($keyName): bool
    {
        return array_key_exists($keyName, $this->data);
    }

    // USE TERNERY OPERATOR IN CASE OF IF ELSE
    // CONFUSION IN TERNERY -> MUST BE RESOLVED


    // TIMEOUT RESOURCE SET
    // something came by - using timestamp and adding logic that
    // after this timstamp the object or whatever will be
    //unset/destructed/removed/deleted

    // INCRBY / DECRBY SEPARATE IMPLEMENTATION
}
