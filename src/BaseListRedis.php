<?php
declare(strict_types=1);

namespace CactusPhpRedis;

class BaseRedis
{
    private bool $declared = false;
    private array $list;
    // private - so needed getter setter method here in this class

    public function __construct() {
        $this->list = array();
        $this->declared = true;
        echo "Base List Redis Constructor";
    }

    public function __set($value)
    {
        echo "Setting '$value' to list \n";
        $this->data[$keyName] = $value;
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


    // USE TERNERY OPERATOR IN CASE OF IF ELSE

    // TIMEOUT RESOURCE SET

    // INCRBY / DECRBY SEPARATE IMPLEMENTATION
}
